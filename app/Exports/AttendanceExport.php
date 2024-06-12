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

class AttendanceExport implements  FromArray , WithHeadings , WithStyles, WithCustomStartCell, WithColumnWidths, WithEvents
{
    private $data;
    private $startDate;
    private $endDate;
    public function __construct($reports , $startDate, $endDate)
    {
        $formattedData = [];




        foreach($reports as $key=>$report)
        {


            $formattedData[] = [
                'Employee'         => $report->employee?->name,
                'Date'       =>date('Y-m-d', strtotime($report->dutyDate)),
                'Shift'  =>$report->shift->shiftName,
                'Time-in'   =>date("d-m-Y g:i a",strtotime($report->inTime)),
                'Time-out'         => $report->outTime !=null ? date("d-m-Y g:i a",strtotime($report->outTime)) : '--',
                'Working Time'       => intval($report->workingMiniute/60).' h : '.intval($report->workingMiniute%60).' min',
                'Late'  =>intval($report->lateMiniute/60).' h : '.intval($report->lateMiniute%60).' min',
                'Overtime'   =>intval($report->overtimeMiniute/60).' h : '.intval($report->overtimeMiniute%60).' min',
                'Status'  =>$report->status,
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
            'E' => 20,
            'F' => 20,
            'G' => 20,
            'H' => 20,
            'I' => 20,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A6')->getFont()->setBold(true);
        $sheet->getStyle('B6')->getFont()->setBold(true);
        $sheet->getStyle('C6')->getFont()->setBold(true);
        $sheet->getStyle('D6')->getFont()->setBold(true);
        $sheet->getStyle('E6')->getFont()->setBold(true);
        $sheet->getStyle('F6')->getFont()->setBold(true);
        $sheet->getStyle('G6')->getFont()->setBold(true);
        $sheet->getStyle('H6')->getFont()->setBold(true);
        $sheet->getStyle('I6')->getFont()->setBold(true);

    }

    public function array(): array
    {
        return $this->data;
    }
    public function headings(): array
    {

            return [
                'Employee',
                'Date',
                'Shift',
                'Time-in',
                'Time-out',
                'Working Time',
                'Late',
                'Overtime',
                'Status',
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
                $event->sheet->getDelegate()->setCellValue('A5', 'Attendance Report')->getStyle('A5')->getFont()->setBold(true);
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
