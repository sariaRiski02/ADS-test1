<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CutiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nomor_induk_id' => $this->nomor_induk_id,
            'tanggal_cuti' => $this->formatDate($this->tanggal_cuti),
            'lama_cuti' => $this->lama_cuti,
            'keterangan' => $this->keterangan,
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
