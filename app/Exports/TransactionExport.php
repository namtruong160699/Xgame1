<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransactionExport implements FromCollection, WithHeadings
{
    private $transactions;
    public function __construct($transactions)
    {
        $this->transactions = $transactions;
    }

    public function collection()
    {
        $transactions = $this->transactions;

        $formatTransaction = [];

        foreach ($transactions as $key => $item)
        {
            $formatTransaction[] = [
                'id' => $item->id,
                'name' => $item->user->name,
                'total' => number_format($item->tr_total,0,',','.'),
                'note' => $item->tr_note,
                'address' => $item->tr_address,
                'phone' => $item->tr_phone,
                'status' => $item->getStatus($item->tr_status)['name'],
                'create' => $item->created_at
            ];
        }
        return collect($formatTransaction);
    }

    public function headings(): array
    {
        return [
            '#',
            'Họ tên',
            "Tổng tiền",
            'Note',
            'Địa chỉ',
            'Số điện thoại',
            'Trạng thái',
            'Ngày tạo',
        ];
    }
}
