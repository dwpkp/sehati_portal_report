<?php
namespace App\Exports;

use App\VUserlogz;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;

class VUserlogs implements FromQuery, WithHeadings, ShouldAutoSize, WithEvents, WithTitle
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
        return 'User Visit Log';
    }

    public function query()
    {
        return VUserlogz::query()->select(['npk' , 'nama' , 'job' , 'cabang' , 'wilayah' , 'report_tittle' , 'access_at'])->whereBetween('access_at',[$this->datestart,$this->dateend]);

    }

    public function headings(): array
    {
        return ["NPK", "NAMA", "JOB" ,"CABANG","WILAYAH","REPORT","DATE"];
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
