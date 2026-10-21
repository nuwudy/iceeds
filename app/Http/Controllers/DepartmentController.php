<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DepartmentController extends Controller
{
    /**
     * Display the primary hub for Department of Philosophy & Theology.
     */
    public function index(): View
    {
        return view('pages.departments.index', [
            'heroImage' => asset('images/departments/philosophy-theology-hero.webp'),
            'philosophyImage' => asset('images/departments/department-of-philosophy.webp'),
            'islamicImage' => asset('images/departments/chamber-islamic-studies.webp'),
            'christianImage' => asset('images/departments/chamber-christian-studies.webp'),
            'hindutvaImage' => asset('images/departments/chamber-hindutva-studies.webp'),
        ]);
    }

    /**
     * Display the Department of Philosophy (Psychology & Sociology).
     */
    public function philosophy(Request $request): View
    {
        $activeSection = $request->query('tab', 'all');

        return view('pages.departments.philosophy', [
            'activeSection' => $activeSection,
            'heroImage' => asset('images/departments/department-of-philosophy.webp'),
            'mainHeroImage' => asset('images/departments/philosophy-theology-hero.webp'),
        ]);
    }

    /**
     * Display the Department of Theology (Islamic, Christian, and Hindutva Chambers).
     */
    public function theology(Request $request): View
    {
        $chamber = $request->query('chamber', 'all');

        return view('pages.departments.theology', [
            'chamber' => $chamber,
            'islamicImage' => asset('images/departments/chamber-islamic-studies.webp'),
            'christianImage' => asset('images/departments/chamber-christian-studies.webp'),
            'hindutvaImage' => asset('images/departments/chamber-hindutva-studies.webp'),
            'mainHeroImage' => asset('images/departments/philosophy-theology-hero.webp'),
        ]);
    }

    /**
     * Direct alias for Psychology division.
     */
    public function psychology(): View
    {
        return view('pages.departments.philosophy', [
            'activeSection' => 'psychology',
            'heroImage' => asset('images/departments/department-of-philosophy.webp'),
            'mainHeroImage' => asset('images/departments/philosophy-theology-hero.webp'),
        ]);
    }

    /**
     * Direct alias for Sociology division.
     */
    public function sociology(): View
    {
        return view('pages.departments.philosophy', [
            'activeSection' => 'sociology',
            'heroImage' => asset('images/departments/department-of-philosophy.webp'),
            'mainHeroImage' => asset('images/departments/philosophy-theology-hero.webp'),
        ]);
    }

    /**
     * Direct alias for Chamber of Islamic Studies.
     */
    public function islamicStudies(): View
    {
        return view('pages.departments.theology', [
            'chamber' => 'islamic',
            'islamicImage' => asset('images/departments/chamber-islamic-studies.webp'),
            'christianImage' => asset('images/departments/chamber-christian-studies.webp'),
            'hindutvaImage' => asset('images/departments/chamber-hindutva-studies.webp'),
            'mainHeroImage' => asset('images/departments/philosophy-theology-hero.webp'),
        ]);
    }

    /**
     * Direct alias for Chamber of Christian Studies.
     */
    public function christianStudies(): View
    {
        return view('pages.departments.theology', [
            'chamber' => 'christian',
            'islamicImage' => asset('images/departments/chamber-islamic-studies.webp'),
            'christianImage' => asset('images/departments/chamber-christian-studies.webp'),
            'hindutvaImage' => asset('images/departments/chamber-hindutva-studies.webp'),
            'mainHeroImage' => asset('images/departments/philosophy-theology-hero.webp'),
        ]);
    }

    /**
     * Direct alias for Chamber of Hindutva Studies.
     */
    public function hindutvaStudies(): View
    {
        return view('pages.departments.theology', [
            'chamber' => 'hindutva',
            'islamicImage' => asset('images/departments/chamber-islamic-studies.webp'),
            'christianImage' => asset('images/departments/chamber-christian-studies.webp'),
            'hindutvaImage' => asset('images/departments/chamber-hindutva-studies.webp'),
            'mainHeroImage' => asset('images/departments/philosophy-theology-hero.webp'),
        ]);
    }
}
