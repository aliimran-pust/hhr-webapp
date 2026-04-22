<?php

namespace App\Exports;

use App\Models\MembershipApplication;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class MembershipApplicationExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return MembershipApplication::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name (BN)',
            'Name (EN)',
            'Father\'s Name',
            'Mother\'s Name',
            'Batch/Passing Year',
            'Present Address',
            'Permanent Address',
            'Job Description',
            'Mobile',
            'Email',
            'Occupation',
            'Group',
            'T-Shirt Size',
            'Interested in Guests',
            'Guest Count',
            'Guest Details',
            'Total Amount',
            'Transaction ID',
            'Status',
            'Submitted At',
        ];
    }

    public function map($application): array
    {
        $guestDetailsStr = '';
        if ($application->guest_details) {
            foreach ($application->guest_details as $g) {
                $guestDetailsStr .= $g['name'] . ' (' . $g['age'] . ', ' . $g['relation'] . '); ';
            }
        }

        return [
            $application->id,
            $application->name_bn,
            $application->name_en,
            $application->father_name,
            $application->mother_name,
            $application->batch_passing_year,
            $application->present_address,
            $application->permanent_address,
            $application->job_description,
            $application->mobile,
            $application->email,
            $application->occupation,
            $application->group,
            $application->t_shirt_size,
            $application->interested_in_guests,
            $application->guest_count ?? 0,
            $guestDetailsStr,
            $application->total_amount,
            $application->transaction_id,
            $application->application_status,
            $application->created_at->format('d/m/Y h:i A'),
        ];
    }
}
