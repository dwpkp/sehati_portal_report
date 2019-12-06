<?php
namespace App\Exports;

use DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;

class VUserlogs2 implements FromQuery, WithHeadings, ShouldAutoSize, WithEvents, WithTitle
{
    public function __construct(string $datestart, string $dateend)
    {
        if (($datestart == '') && ($dateend == ''))
        {
            $mytime = Carbon\Carbon::now();
            $this->datestart = $mytime-7;
            $this->dateend = $mytime;
        }else{
            $this->datestart = $datestart;
            $this->dateend = $dateend;
        }
    }

    public function title(): string
    {
        return 'X '.$this->datestart.' - '.$this->dateend;
    }

    public function query()
    {

      $query = DB::table('userlog')
          ->whereBetween('access_at',[$this->datestart,$this->dateend])->distinct('npk')->pluck('npk');

      $data = DB::connection('oracle')->table('APPL.RPT_ROLE_V')->select('person_empl_id','person_full_name','job_desc','coyoutlet_nick_name')->wherein('ROLE',['HO','S','A','BM','OF'])->whereNotIn('PERSON_EMPL_ID',$query)->orderBy('coyoutlet_nick_name');



        return $data;
    }

    public function headings(): array
    {
        //return ["NPK", "NAMA", "JOB" ,"CABANG","REPORT","DATE"];
        return [ "NO" , "NPK", "NAMA", "JOB" ,"CABANG"];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {

                $event->sheet->getDelegate()->getStyle('A1:G1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FF1E90FF');

            },
        ];
    }
}
