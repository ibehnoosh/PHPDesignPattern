<?php
interface Exam {
    public function displayQuestions();
    public function receiveAnswers();
}

class BasicExam implements Exam {
    public function displayQuestions() {
        echo 'Basic_displayQuestions'.PHP_EOL;
    }

    public function receiveAnswers() {
        echo 'Basic_receiveAnswers'.PHP_EOL;
    }
}

abstract class ExamDecorator implements Exam {
    protected $exam;

    public function __construct(Exam $exam) {
        $this->exam = $exam;
    }

    public function displayQuestions() {
        $this->exam->displayQuestions();
    }

    public function receiveAnswers() {
        $this->exam->receiveAnswers();
    }
}

class TimeTracker extends ExamDecorator {
    public function displayQuestions() {
        parent::displayQuestions();
        // start tracking time
        echo 'TimeTracker_displayQuestions'.PHP_EOL;
    }

    public function receiveAnswers() {
        parent::receiveAnswers();
        echo 'TimeTracker_receiveAnswers'.PHP_EOL;
    }
}

class ExplanationDecorator extends ExamDecorator {
    public function displayQuestions() {
        parent::displayQuestions();
        echo 'ExplanationDecorator'.PHP_EOL;
    }
}

$basicExam = new BasicExam();
$trackedExam = new TimeTracker($basicExam);
//$explainedExam = new ExplanationDecorator($trackedExam);

$trackedExam->displayQuestions();
$trackedExam->receiveAnswers();
