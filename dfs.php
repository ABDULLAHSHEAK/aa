<?php
class Person
{
  public $name;
  public $age;

  // constructor
  public function __construct($name, $age)
  {
    $this->name = $name;
    $this->age = $age;
  }
  // method
  public function introduce()
  {
    $result = <<<ABCD
  My name is {$this->name} and I am {$this->age} years old.
  ABCD;
    echo $result;
  }
}
class Student extends Person
{
  // Additional attribute
  private $mark;

  // Constructor
  public function __construct($name, $age, $mark)
  {
    parent::__construct($name, $age);
    $this->mark = $mark;
  }

  // Method override
  public function introduce()
  {
    echo "My name is {$this->name}, I am {$this->age} years old.\n";
  }

  // Additional method to calculate the grade percentage
  public function calculate_grade_percentage()
  {
    // Assuming that $this->mark is out of 100
    $gradePercentage = (floatval($this->mark) / 100) * 100;
    return "{$gradePercentage}%";
  }
}

$student = new Student("Robert", 18, "85");
$student->introduce();
$gradePercentage = $student->calculate_grade_percentage();
echo "My grade percentage is {$gradePercentage}\n";
