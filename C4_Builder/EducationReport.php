<?php
abstract class StudentReportBuilder
{
    protected $studentReport;

    public function getStudentReport()
    {
        return $this->studentReport;
    }

    public abstract function buildStudentName();
    public abstract function buildStudentID();
    public abstract function buildGrades();
    public abstract function buildAverageGrade();
}

class FullReportBuilder extends StudentReportBuilder
{
    public function __construct()
    {
        $this->studentReport = new StudentReport();
    }

    public function buildStudentName()
    {
        $this->studentReport->setStudentName("John Doe");
    }

    public function buildStudentID()
    {
        $this->studentReport->setStudentID("123456");
    }

    public function buildGrades()
    {
        $this->studentReport->setGrades(array(
            "Math" => "A",
            "English" => "B",
            "Science" => "A",
            "History" => "C"
        ));
    }

    public function buildAverageGrade()
    {
        $this->studentReport->setAverageGrade("B");
    }
}

class StudentReport
{
    private $studentName;
    private $studentID;
    private $grades;
    private $averageGrade;

    public function setStudentName($studentName)
    {
        $this->studentName = $studentName;
    }

    public function setStudentID($studentID)
    {
        $this->studentID = $studentID;
    }

    public function setGrades($grades)
    {
        $this->grades = $grades;
    }

    public function setAverageGrade($averageGrade)
    {
        $this->averageGrade = $averageGrade;
    }
}

class ReportMaker
{
    private $studentReportBuilder;

    public function setStudentReportBuilder(StudentReportBuilder $studentReportBuilder)
    {
        $this->studentReportBuilder = $studentReportBuilder;
    }

    public function getStudentReport()
    {
        return $this->studentReportBuilder->getStudentReport();
    }

    public function buildReport()
    {
        $this->studentReportBuilder->buildStudentName();
        $this->studentReportBuilder->buildStudentID();
        $this->studentReportBuilder->buildGrades();
        $this->studentReportBuilder->buildAverageGrade();
    }
}

// Client code
$reportMaker = new ReportMaker();
$fullReportBuilder = new FullReportBuilder();
$reportMaker->setStudentReportBuilder($fullReportBuilder);
$reportMaker->buildReport();
$

