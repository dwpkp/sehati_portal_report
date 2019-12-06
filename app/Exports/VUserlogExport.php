<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class VUserlogExport implements WithMultipleSheets
{
    use Exportable;

    public function __construct(string $datestart, string $dateend)
    {
        if (($datestart == null) && ($dateend == null))
        {
            $mytime = Carbon\Carbon::now();
            $this->datestart = $mytime-7;
            $this->dateend = $mytime;
        }else{
            $this->datestart = $datestart;
            $this->dateend = $dateend;
        }
    }

    public function sheets(): array
    {
        $sheets = [];

        $sheets[0] = new VUserlogs($this->datestart,$this->dateend);
        $sheets[2] = new VUserlogs2($this->datestart,$this->dateend);

        return $sheets;
    }

}
