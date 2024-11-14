@extends('layouts.home-layout')

@section('content')
    <div style="width: 100%; padding: 2rem;">
        <!-- Navbar -->
        <header style="display: flex; justify-content: space-between; align-items: center; background-color: #16a34a; box-shadow: 0 4px 6px rgba(0,0,0,0.1); width: 100%; color: white; padding: 1rem 2rem;">
            <h1 style="font-size: 2.25rem; font-weight: bold;">Quick Notes</h1>
            <nav style="display: flex; gap: 1.5rem;">
            @if(auth()->check())
            <span style="font-size: 1rem; font-weight: bold; margin-right: 1rem;">
                {{ auth()->user()->name }}
            </span>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: white; text-decoration: underline; margin-left: 1rem;">Log Out</a>
            
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
             @else
                <a href="{{ route('login') }}" style="font-size: 0.875rem; color: white; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#a7f3d0'" onmouseout="this.style.color='white'">Log In</a>
                <a href="{{ route('register') }}" style="font-size: 0.875rem; color: white; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#a7f3d0'" onmouseout="this.style.color='white'">Sign Up</a>
                @endif
            </nav>
        </header>

        <!-- Hero Section -->
        <div style="margin-top: 8rem; text-align: center;">
            <h1 style="font-size: 3.75rem; font-weight: bold; color: white;">
                The best way to create and store your notes
            </h1>
            <p style="margin-top: 1rem; font-size: 1.125rem; color: #4b5563;">Organize your thoughts, tasks, and ideas with ease. Start using Quick Notes today.</p>
            <div style="margin-top: 2rem;">
                @if(auth()->check())
                <a href="{{ route('notes.index') }}" style="background-color: #16a34a; color: white; font-size: 1rem; font-weight: bold; padding: 0.75rem 1.5rem; border-radius: 0.375rem; text-decoration: none; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#15803d'" onmouseout="this.style.backgroundColor='#16a34a'">
                    Go to your notes
                </a>
                @else
                <a href="{{ route('register') }}" style="background-color: #16a34a; color: white; font-size: 1rem; font-weight: bold; padding: 0.75rem 1.5rem; border-radius: 0.375rem; text-decoration: none; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#15803d'" onmouseout="this.style.backgroundColor='#16a34a'">
                    Get Started
                </a>
                @endif
            </div>
        </div>
    </div>