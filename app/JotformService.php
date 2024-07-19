<?php

namespace App\Services;

use JotForm;

class JotFormService
{
    protected $jotform;

    public function __construct()
    {
        $apiKey = config('app.jotform_api_key');
        $this->jotform = new JotForm($apiKey);
    }

    public function getFormSubmissions($formId)
    {
        return $this->jotform->getFormSubmissions($formId);
    }
    public function removeFormSubmissions($submissionId)
    {
        return $this->jotform->deleteSubmission($submissionId);
    }
    // Add more methods to interact with the JotForm API as needed

}
