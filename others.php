<!-- <?php

// // Methods:

// // - __construct(name (string), age (integer)): Initialize the 'name' and 'age' attributes with the given values.

// // - introduce(): Print a message introducing the person with their name and age.



// // Template: (This is a template, so implement the things as directed above.)

// // <?php

// class Person
// {
//   public $name;
//   public $age;

//   // constructor
//   public function __construct($name, $age)
//   {
//     $this->name = $name;
//     $this->age = $age;
//   }
//   // method
//   public function introduce()
//   {
//     $result = <<<ABCD
//   My name is {$this->name} and I am {$this->age} years old.
//   ABCD;
//     echo $result;
//   }
// }
// $person = new Person("John", 30);

// $person->introduce();


// // Example:

// // $person = new Person("John", 30);

// // $person->introduce();


// // Expected Output:

// // My name is John and I am 30 years old.
class Person{
  public $name ;
  public $age ;

  public function __construct($name,$age){
    $this->name = $name;
    $this->age = $age;
  }
}

class Student extends Person {

// attribute
public $mark ;
    

// constructor

public function __construct($mark){
      $this->mark = $mark;
}

    

// method
public function(){

}
    

// method override )

    

// additional method

public function calculate_grade_percentage() {

     // Assume that the mark is out of 100

     // Implement your logic to calculate the mark percentage here

     

}

 

    

}

Example:

$student = new Student("Robert", 18, “85”);

$student->introduce();

$gradePercentage = $student->calculate_grade_percentage();

echo "My grade percentage is {$gradePercentage}\n";

 

Expected Output:

My name is Alice, I am 18 years old.

My grade percentage is 85%. -->