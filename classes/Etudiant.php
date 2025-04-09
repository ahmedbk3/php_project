<?php
class Etudiant {
    private $name;
    private $grades;

    public function __construct($name, $grades) {
        $this->name = $name;
        $this->grades = $grades;
    }

    public function displayGrades() {
        foreach ($this->grades as $grade) {
            echo "<div style='background-color: " . ($grade < 10 ? 'red' : ($grade > 10 ? 'green' : 'orange')) . "'>$grade</div>";
        }
    }

    public function average() {
        return array_sum($this->grades) / count($this->grades);
    }

    public function admissionStatus() {
        return $this->average() >= 10 ? 'admis' : 'non admis';
    }
}
?>
