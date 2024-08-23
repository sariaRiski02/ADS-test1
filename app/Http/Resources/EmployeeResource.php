<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        if (!$this->resource) {
            return [
                'message' => 'Employee not found',
            ];
        }

        return [
            'nomor_induk' => $this->nomor_induk,
            'nama' => $this->nama,
            'alamat' => $this->alamat,
            'tanggal_lahir' => $this->formatDate($this->tanggal_lahir),
            'tanggal_bergabung' => $this->formatDate($this->tanggal_bergabung),

        ];
    }

    private function formatDate($date)
    {
        if (!$date) {
            return null;
        }
        return $date instanceof Carbon ? $date->format('d-m-Y') : Carbon::parse($date)->format('d-m-Y');
    }
}
