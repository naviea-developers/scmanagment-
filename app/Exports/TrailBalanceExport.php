<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class TrailBalanceExport implements  FromArray , WithHeadings , WithStyles, WithCustomStartCell, WithColumnWidths, WithEvents
{
    private $data;
    private $startDate;
    private $endDate;
    public function __construct($transactions , $startDate, $endDate)
    {
        $formattedData = [];
        $total = 0;


       $total_dr=0; $total_cr=0;
        foreach($transactions as $transaction)
        {
            if($transaction->type == 1 || $transaction->type == 5){
                $total_cr += $transaction->b_acount;
                $dr = '--';
                $cr =  round($transaction->b_acount,2);
            }else{
                $total_dr += $transaction->b_acount;
                $dr = round($transaction->b_acount,2);
                $cr =  '--';
            }

            $formattedData[] = [
                'Account Name'         => $transaction->account_name,
                'Account Code'       =>$transaction->account_code,
                'Debit'  => 'BDT '.$dr,
                'Credit'   =>'BDT '.$cr

            ];



        }
        if($formattedData != [])
        {
            $formattedData[] = [
                'Account Name'         => 'Total',
                'Account Code'       =>'',
                'Debit'  =>'BDT '.round($total_dr,2),
                'Credit'   =>  'BDT '.round($total_cr,2)
            ];
        }

        $this->data         = $formattedData;
        $this->startDate    = $startDate;
        $this->endDate      = $endDate;
    }
     public function startCell(): string
    {
        return 'A6';
    }

    public function columnWidths(): array
    {
        return [
            'A' => 30,
            'B' => 20,
            'C' => 20,
            'D' => 20,

        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A6')->getFont()->setBold(true);
        $sheet->getStyle('B6')->getFont()->setBold(true);
        $sheet->getStyle('C6')->getFont()->setBold(true);
        $sheet->getStyle('D6')->getFont()->setBold(true);

    }

    public function array(): array
    {
        return $this->data;
    }
    public function headings(): array
    {

            return [
               'Account Name',
                'Account Code',
                'Debit',
                'Credit',
            ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getDelegate()->mergeCells('A1:K1');
                $event->sheet->getDelegate()->mergeCells('A2:K2');
                $event->sheet->getDelegate()->mergeCells('A3:K3');
                $event->sheet->getDelegate()->mergeCells('A4:K4');
                $event->sheet->getDelegate()->mergeCells('A5:K5');

                $results = \App\Models\Tp_option::where('option_name', 'theme_option_school_info')->first();
                if($results){
                    $dataObj = json_decode($results->option_value);
                    $data['school_name'] = $dataObj->school_name ?? '';
                    $data['phone1'] = $dataObj->phone1 ?? '';
                    $data['email'] = $dataObj->email ?? '';
                    $data['address'] = $dataObj->address ?? '';
                }else{
                    $data['school_name'] = "";
                    $data['phone1'] = "";
                    $data['email'] = "";
                    $data['address'] = "";
                }
                $event->sheet->getDelegate()->setCellValue('A1',$data['school_name'])->getStyle('A1')->getFont()->setBold(true);
                $event->sheet->getDelegate()->setCellValue('A2', $data['phone1'])->getStyle('A2')->getFont()->setBold(true);
                $event->sheet->getDelegate()->setCellValue('A3', $data['address'])->getStyle('A3')->getFont()->setBold(true);


                $event->sheet->getDelegate()->setCellValue('A4', 'Date : ' . $this->startDate . ' - ' . $this->endDate)->getStyle('A4')->getFont()->setBold(true);
                $event->sheet->getDelegate()->setCellValue('A5', 'Trail Balance')->getStyle('A5')->getFont()->setBold(true);
                $startRow = 1;
                $lastRow = $event->sheet->getHighestRow();

                $event->sheet->getStyle('A' . $startRow . ':Z' . $lastRow)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);


                $data = $this->data;
                foreach ($data as $index => $row) {
                    if (isset($row['SL']) && ($row['SL'] == 'Total')) {
                        $rowIndex = $index + 7; // Adjust for 1-based indexing and header row
                        $event->sheet->getStyle('A' . $rowIndex . ':D' . $rowIndex)
                            ->applyFromArray([
                                'font' => [
                                    'bold' => true,
                                ],
                            ]);
                    }
                }
            },
        ];
    }
}
