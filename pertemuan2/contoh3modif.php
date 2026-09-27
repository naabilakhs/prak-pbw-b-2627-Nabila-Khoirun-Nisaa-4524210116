<?php
interface Identitas
{
    public function ringkasan(): string;
}

class Mahasiswa implements Identitas
{
    private string $nim;
    private string $nama;
    private int $semester;
    protected float $ipk;

    public function __construct(
        string $nim,
        string $nama,
        int $semester,
        float $ipk
    ) {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->semester = $semester;
        $this->setIpk($ipk);
    }

    public function setIpk(float $ipk): void
    {
        if ($ipk < 0 || $ipk > 4) {
            throw new InvalidArgumentException('IPK harus 0 sampai 4.');
        }

        $this->ipk = $ipk;
    }

    public function getIpk(): float
    {
        return $this->ipk;
    }

    // Modifikasi 1: Menambahkan status berdasarkan IPK
    public function getPredikat(): string
    {
        if ($this->ipk >= 3.50) {
            return 'Sangat Memuaskan';
        } elseif ($this->ipk >= 3.00) {
            return 'Memuaskan';
        } else {
            return 'Perlu Peningkatan';
        }
    }

    public function ringkasan(): string
    {
        // Modifikasi 2: Menambahkan informasi semester dan predikat
        return $this->nim
            . ' - ' . $this->nama
            . ' - Semester: ' . $this->semester
            . ' - IPK: ' . $this->ipk
            . ' - Predikat: ' . $this->getPredikat();
    }
}

$mhs = new Mahasiswa(
    '4524210116',
    'Nabila Khoirun Nisaa',
    5,
    3.75
);

echo $mhs->ringkasan();