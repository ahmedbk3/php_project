<?php
class Etudiant {
    private $name;
    private $grades = [];

    public function __construct($name, $grades) {
        $this->name = $name;
        $this->grades = $grades;
    }

    public function displayGrades() {
        echo "<h2>Grades for $this->name</h2>";
        echo "<table border='1' style='border-collapse: collapse; border: 1px solid #444444; border-radius: 15px; padding: 10px; align: center;'>";
        echo "<tr style:'align: center; padding: 10px; border-radius: 15px;'><th style:'text-align: center; padding: 10px; border-radius: 15px;'>Grade</th></tr>";
        foreach ($this->grades as $grade) {
            $color = $this->getColor($grade);
            echo "<tr><td style='background-color: $color; text-align: center; padding: 10px;'>$grade</td></tr>";
        }
        echo "</table>";
        echo "<h3>Grades with colors:</h3>";
        echo "<div style='display: flex; flex-wrap: wrap;'>";
        foreach ($this->grades as $grade) {
            $color = $this->getColor($grade);
            echo "<div style='width: 50px; height: 50px; border: 1px solid black; margin: 5px; display: flex; align-items: center; justify-content: center; background-color: $color; border-radius: 15px; border: 1px solid #444444;'>$grade</div>";
        }
        echo "</div>";
    }

    public function average() {
        return array_sum($this->grades) / count($this->grades);
    }

    public function admissionStatus() {
        return $this->average() >= 10 ? "Admitted" : "Not Admitted";
    }

    private function getColor($grade) {
        if ($grade < 10) {
            return '#d9534f'; // Red
        } elseif ($grade > 10) {
            return '#85d254'; // Green
        } else {
            return '#fcb329'; // Orange
        }
    }

    public function displayResult() {
        echo "<strong>Average: </strong><p>" . $this->average() . "</p><br>";
        $color = $this->admissionStatus() == "Admitted" ? '#85d254' : '#d9534f';
        echo "<strong>Status: </strong><p style='color: $color;'>" . $this->admissionStatus() . "</p>";
    }
}
?>
