<?php

namespace App\Http\Requests;

use App\DifficultyLevel;
use Illuminate\Foundation\Http\FormRequest;

class SaveHikeFormRequest extends FormRequest
{
    public Bool $wouldRecommend;
    public String $hikeName;
    public Float $steepness;
    public Float $miles;
    public DifficultyLevel $difficulty;
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // 'would_recommend' => 'required|bool',
            'hike_name' => 'required|string',
            'steepness' => 'required|decimal:0,2',
            'miles' => 'required|numeric',
            'difficulty' => 'required|string'
        ];
    }

    protected function passedValidation()
    {
        $this->wouldRecommend = $this->has('would_recommend') ? 1 : 0;
        $this->hikeName = $this->input('hike_name');
        $this->steepness = $this->input('steepness');
        $this->miles = (float)$this->input('miles');
        $this->difficulty = DifficultyLevel::from($this->input('difficulty'));
    }
}
