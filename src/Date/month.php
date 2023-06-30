<?php



namespace App\Date;

class Month
{

    private $months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
    private $month;
    private $year;


    /**
     *constructeur
     * @param int $month le mois compris entre 1 et 12
     * @param int $year l'année
     * @throws \Exception
     */


    public function __construct(?int $month = null, ?int $year = null)
    {
        if ($month === null) {
            $month = intval(date('m'));
        }
        if ($year === null) {
            $year = intval(date('Y'));
        }
        $month = $month % 12;
        if ($year < 1970) {
            throw new \Exception("L'année est inferieur a 1970'");
        }
        $this->month = $month;
        $this->year = $year;
    }

    /**
     *retourne le mois en toute lettre
     * @return string
     */
    public function toString(): string
    {
        return $this->months[$this->month - 1] . ' ' . $this->year;
    }

    public function getWeeks (): int
    {
        $start = new \DateTime("{$this->year}-{$this->month}-01");
        $end =  (clone $start)->modify('+1 month -1 day');
        //var_dump($start, $end);
        $weeks = intval($end->format('W')) - intval($start->format('W')) + 1;
        if($weeks < 0){
            $weeks = intval($end->format('W'));
        }
        return $weeks;
    }
}