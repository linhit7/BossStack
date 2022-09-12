<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ImportExport implements FromView, WithEvents
{
    public $data;

    public function __construct($data = "")
    {
        $this->data = $data;
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                // ... HERE YOU CAN DO ANY FORMATTING
                $event->sheet->getRowDimension('2')->setRowHeight(30.75);
                $event->sheet->getColumnDimension('A')->setWidth(5.86);
                $event->sheet->getColumnDimension('B')->setWidth(46.17);
                $event->sheet->getColumnDimension('C')->setWidth(9.29);
                $event->sheet->getColumnDimension('D')->setWidth(11.86);
                $event->sheet->getColumnDimension('E')->setWidth(13.57);

                //font chữ time new roman
                $font = [
                    'font' => array(
                        'name' => 'Times New Roman',
                    ),               
                ];
                $event->sheet->getDelegate()->getStyle('A1:F100')->applyFromArray($font);

                $styleArray = [
                    'font' => array(
                        'name' => 'Times New Roman',
                        'bold' => true,
                        'size' => 25
                    ),
                    'fill' => array(
                        'color' => ['arbg' => 'E0F2F7'] 
                    ),
                    'alignment' => [
                        'horizontal' => 'center',
                        'vertical' => 'center'
                    ],
                                    
                ];

                $B4 = [
                    'font' => array(
                        'name' => 'Times New Roman',
                        'bold' => true,
                        'size' => 15
                    ),
                    'fill' => array(
                        'color' => ['arbg' => 'E0F2F7'] 
                    ),
                    'alignment' => [
                        'horizontal' => 'center',
                        'vertical' => 'center'
                    ],
                                    
                ];

                $event->sheet->getDelegate()->getStyle('B2')->applyFromArray($styleArray);
                $event->sheet->getDelegate()->getStyle('B4')->applyFromArray($B4);

                $A6 = [
                    'font' => array(
                        'name' => 'Times New Roman',
                        'bold' => true,
                        'size' => 12
                    ),
                    'fill' => array(
                        'color' => ['arbg' => 'E0F2F7'] 
                    ),                                    
                ];
                $event->sheet->getDelegate()->getStyle('A6')->applyFromArray($A6);
                $event->sheet->getDelegate()->getStyle('A7')->applyFromArray($A6);
                $event->sheet->getDelegate()->getStyle('A12')->applyFromArray($A6);
                $event->sheet->getDelegate()->getStyle('A13')->applyFromArray($A6);
                $event->sheet->getDelegate()->getStyle('A14')->applyFromArray($A6);
                $event->sheet->getDelegate()->getStyle('D13')->applyFromArray($A6);
                $event->sheet->getDelegate()->getStyle('E13')->applyFromArray($A6);

                //Can Giữa
                $center = [
                    'font' => array(
                        'bold' => true
                    ),
                    'fill' => array(
                        'color' => ['arbg' => 'E0F2F7'] 
                    ),
                    'alignment' => [
                        'horizontal' => 'center',
                        'vertical' => 'center'
                    ],
                                    
                ];
                $event->sheet->getDelegate()->getStyle('A16')->applyFromArray($center)->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle('B16')->applyFromArray($center)->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle('C16')->applyFromArray($center)->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle('D16')->applyFromArray($center)->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle('E16')->applyFromArray($center)->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle('C1:C100')->applyFromArray($center)->getAlignment()->setWrapText(true);

                //Tạo border
                $boder = [
                    'borders' => [
                        'inside' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ]
                                    
                ];
                $event->sheet->getDelegate()->getStyle('B2')->applyFromArray($boder);
                $event->sheet->getDelegate()->getStyle('D13:E13')->applyFromArray($boder);
                $event->sheet->getDelegate()->getStyle('A16:E17')->applyFromArray($boder);
            },
        ];
    }
    public function view(): View
    {
        return view('product-manage.import.export', [
            'imports' => $this->data
        ]);
    }
}
