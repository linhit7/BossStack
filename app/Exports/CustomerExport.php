<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class CustomerExport implements FromView, WithEvents
{
     public $data;

    public function __construct($data = "")
    {
        $this->data = $data;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getColumnDimension('A')->setWidth(10);
                $event->sheet->getColumnDimension('B')->setWidth(30);
                $event->sheet->getColumnDimension('C')->setWidth(20);
                $event->sheet->getColumnDimension('D')->setWidth(40);
                $event->sheet->getColumnDimension('E')->setWidth(20);
                $event->sheet->getColumnDimension('F')->setWidth(80);
                $event->sheet->getColumnDimension('G')->setWidth(30);
                $event->sheet->getColumnDimension('H')->setWidth(50);
                $event->sheet->getColumnDimension('I')->setWidth(20);

                $boder = [
                    'font' => array(
                        'bold' => true,
                        'size' => 12
                    ),
                    'fill' => array(
                        'color' => ['arbg' => 'E0F2F7'], 
                        'background' => ['color'=> '#000000'],
                    ),
                    'alignment' => [
                        'horizontal' => 'center',
                        'vertical' => 'center'
                    ],                 
                ];
                $event->sheet->getDelegate()->getStyle('A3:O3')->applyFromArray($boder);


                $styleArray = [
                    'font' => array(
                        'bold' => false,
                        'size' => 12
                    ),
                    'fill' => array(
                        'color' => ['arbg' => 'E0F2F7'] 
                    ),
                    'alignment' => [
                        'horizontal' => 'center',
                        'vertical' => 'center'
                    ],
                                    
                ];

                $event->sheet->getDelegate()->getStyle('C4:C10000')->applyFromArray($styleArray);
                $event->sheet->getDelegate()->getStyle('E4:E10000')->applyFromArray($styleArray);
                $event->sheet->getDelegate()->getStyle('G4:G10000')->applyFromArray($styleArray);
                $event->sheet->getDelegate()->getStyle('I4:I10000')->applyFromArray($styleArray);

//                $event->sheet->getStyle('E2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF0000');
                  
            }
        ];
    }

    public function view(): View
    {
        return view('product-manage.customer.export', [
            'customers' => $this->data
        ]);
    }
}
