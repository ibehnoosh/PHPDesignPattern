<?php
abstract class TranscriptBuilder
{
    protected $transcript;

    public function getTranscript()
    {
        return $this->transcript;
    }

    public abstract function buildPersonalInfo();
    public abstract function buildCoursesTaken();
    public abstract function buildGrades();
    public abstract function buildAchievements();
}

class HighSchoolTranscriptBuilder extends TranscriptBuilder
{
    public function __construct()
    {
        $this->transcript = new Transcript();
    }

    public function buildPersonalInfo()
    {
        $this->transcript->setPersonalInfo("John Doe, 17 years old");
    }

    public function buildCoursesTaken()
    {
        $this->transcript->setCoursesTaken("Math, English, Science, History");
    }

    public function buildGrades()
    {
        $this->transcript->setGrades("A, A, B, C");
    }

    public function buildAchievements()
    {
        $this->transcript->setAchievements("Honor Roll, Varsity Football");
    }
}

//Entity
class Transcript
{
    private $personalInfo;
    private $coursesTaken;
    private $grades;
    private $achievements;

    public function setPersonalInfo($personalInfo)
    {
        $this->personalInfo = $personalInfo;
    }

    public function setCoursesTaken($coursesTaken)
    {
        $this->coursesTaken = $coursesTaken;
    }

    public function setGrades($grades)
    {
        $this->grades = $grades;
    }

    public function setAchievements($achievements)
    {
        $this->achievements = $achievements;
    }
}

class TranscriptMaker
{
    private $transcriptBuilder;

    public function setTranscriptBuilder(TranscriptBuilder $transcriptBuilder)
    {
        $this->transcriptBuilder = $transcriptBuilder;
    }

    public function getTranscript()
    {
        return $this->transcriptBuilder->getTranscript();
    }

    public function buildTranscript()
    {
        $this->transcriptBuilder->buildPersonalInfo();
        $this->transcriptBuilder->buildCoursesTaken();
        $this->transcriptBuilder->buildGrades();
        $this->transcriptBuilder->buildAchievements();
    }
}

// Client code
$transcriptMaker = new TranscriptMaker();
$highSchoolTranscriptBuilder = new HighSchoolTranscriptBuilder();
$transcriptMaker->setTranscriptBuilder($highSchoolTranscriptBuilder);
$transcriptMaker->buildTranscript();
$transcript = $transcriptMaker->getTranscript();
