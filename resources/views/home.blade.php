@extends('layouts.app')

@section('title', 'Home - Elevasi Contractor')

@section('content')
@php
$companyInfo = App\Models\CompanyInfo::first();
$services = App\Models\Service::all();
$projects = App\Models\Project::with(['category', 'client'])->latest()->take(6)->get();
$testimonials = App\Models\Testimonial::all();
$faqs = App\Models\Faq::all();
@endphp

<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="text-center">
            @if($companyInfo)
            <h1 class="text-4xl md:text-6xl font-bold mb-6">
                {{ $companyInfo->company_name ?? 'Elevasi' }}
            </h1>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">
                {{ $companyInfo->short_description ?? 'Professional contractor services for construction and development projects.' }}
            </p>
            @else
            <h1 class="text-4xl md:text-6xl font-bold mb-6">Elevasi</h1>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">
                Professional contractor services for construction and development projects.
            </p>
            @endif
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#contact" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                    Get Started
                </a>
                <a href="#projects" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition-colors">
                    View Projects
                </a>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">About Us</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Learn more about our company and our commitment to excellence in construction.
            </p>
        </div>
        @if($companyInfo)
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ $companyInfo->company_name }}</h3>
                <p class="text-gray-600 mb-6">{{ $companyInfo->full_description }}</p>
                @if($companyInfo->vision)
                <div class="mb-6">
                    <h4 class="text-xl font-semibold text-gray-900 mb-2">Our Vision</h4>
                    <p class="text-gray-600">{{ $companyInfo->vision }}</p>
                </div>
                @endif
                @if($companyInfo->mission)
                <div class="mb-6">
                    <h4 class="text-xl font-semibold text-gray-900 mb-2">Our Mission</h4>
                    <p class="text-gray-600">{{ $companyInfo->mission }}</p>
                </div>
                @endif
            </div>
            <div class="bg-gray-100 rounded-lg p-8">
                <h4 class="text-xl font-semibold text-gray-900 mb-4">Why Choose Us?</h4>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-green-500 mr-3 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-gray-600">Experienced professionals with years of expertise</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-green-500 mr-3 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-gray-600">Quality workmanship and attention to detail</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-green-500 mr-3 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-gray-600">Timely project completion and budget adherence</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-6 w-6 text-green-500 mr-3 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-gray-600">Licensed and insured for your protection</span>
                    </li>
                </ul>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Services</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                We offer a comprehensive range of construction and development services.
            </p>
        </div>
        @if($services->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                @if($service->icon)
                <div class="text-4xl mb-4">{{ $service->icon }}</div>
                @else
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                @endif
                <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ $service->title }}</h3>
                <p class="text-gray-600">{{ $service->description }}</p>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center text-gray-500">
            <p>Services will be displayed here once added through the admin panel.</p>
        </div>
        @endif
    </div>
</section>

<!-- Projects Section -->
<section id="projects" class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Projects</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Explore our portfolio of completed construction projects.
            </p>
        </div>
        @if($projects->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($projects as $project)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                @if($project->featured_image)
                <img src="{{ asset('storage/' . $project->featured_image) }}" alt="{{ $project->title }}" class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                    <svg class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                @endif
                <div class="p-6">
                    <div class="flex items-center mb-2">
                        @if($project->category)
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                            {{ $project->category->name }}
                        </span>
                        @endif
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $project->title }}</h3>
                    <p class="text-gray-600 mb-3">{{ Str::limit($project->description, 100) }}</p>
                    @if($project->location)
                    <p class="text-sm text-gray-500 mb-2">
                        <svg class="h-4 w-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        {{ $project->location }}
                    </p>
                    @endif
                    @if($project->project_date)
                    <p class="text-sm text-gray-500">
                        <svg class="h-4 w-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        {{ $project->project_date->format('M Y') }}
                    </p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center text-gray-500">
            <p>Projects will be displayed here once added through the admin panel.</p>
        </div>
        @endif
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">What Our Clients Say</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Hear from our satisfied clients about their experience working with us.
            </p>
        </div>
        @if($testimonials->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($testimonials as $testimonial)
            <div class="bg-white rounded-lg shadow-md p-6">
                @if($testimonial->rating)
                <div class="flex items-center mb-4">
                    @for($i = 1; $i <= 5; $i++)
                        <svg class="h-5 w-5 {{ $i <= $testimonial->rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        @endfor
                </div>
                @endif
                <blockquote class="text-gray-600 mb-4 italic">
                    "{{ $testimonial->caption }}"
                </blockquote>
                <div class="flex items-center">
                    @if($testimonial->photo)
                    <img src="{{ asset('storage/' . $testimonial->photo) }}" alt="{{ $testimonial->client_name }}" class="w-12 h-12 rounded-full mr-4">
                    @else
                    <div class="w-12 h-12 bg-gray-300 rounded-full flex items-center justify-center mr-4">
                        <span class="text-gray-600 font-semibold">{{ substr($testimonial->client_name, 0, 1) }}</span>
                    </div>
                    @endif
                    <div>
                        <h4 class="font-semibold text-gray-900">{{ $testimonial->client_name }}</h4>
                        @if($testimonial->position)
                        <p class="text-sm text-gray-600">{{ $testimonial->position }}</p>
                        @endif
                        @if($testimonial->company)
                        <p class="text-sm text-gray-600">{{ $testimonial->company }}</p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center text-gray-500">
            <p>Testimonials will be displayed here once added through the admin panel.</p>
        </div>
        @endif
    </div>
</section>

<!-- FAQ Section -->
@if($faqs->count() > 0)
<section id="faq" class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Frequently Asked Questions</h2>
            <p class="text-lg text-gray-600">
                Find answers to common questions about our services.
            </p>
        </div>
        <div class="space-y-4">
            @foreach($faqs as $faq)
            <div class="bg-gray-50 rounded-lg">
                <button class="w-full px-6 py-4 text-left focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg" onclick="toggleFaq(this)">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-medium text-gray-900">{{ $faq->question }}</h3>
                        <svg class="h-6 w-6 text-gray-500 transform transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </button>
                <div class="px-6 pb-4 hidden">
                    <p class="text-gray-600">{{ $faq->answer }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Contact Section -->
<section id="contact" class="py-16 bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Contact Us</h2>
            <p class="text-lg text-gray-300 max-w-2xl mx-auto">
                Ready to start your next project? Get in touch with us today.
            </p>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div>
                <h3 class="text-2xl font-semibold mb-6">Get In Touch</h3>
                @if($companyInfo)
                <div class="space-y-4">
                    @if($companyInfo->address)
                    <div class="flex items-start">
                        <svg class="h-6 w-6 text-blue-400 mr-3 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <div>
                            <h4 class="font-medium">Address</h4>
                            <p class="text-gray-300">{{ $companyInfo->address }}</p>
                        </div>
                    </div>
                    @endif
                    @if($companyInfo->phone)
                    <div class="flex items-start">
                        <svg class="h-6 w-6 text-blue-400 mr-3 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <div>
                            <h4 class="font-medium">Phone</h4>
                            <p class="text-gray-300">{{ $companyInfo->phone }}</p>
                        </div>
                    </div>
                    @endif
                    @if($companyInfo->email)
                    <div class="flex items-start">
                        <svg class="h-6 w-6 text-blue-400 mr-3 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <div>
                            <h4 class="font-medium">Email</h4>
                            <p class="text-gray-300">{{ $companyInfo->email }}</p>
                        </div>
                    </div>
                    @endif
                </div>
                @endif
            </div>
            <div>
                <form class="bg-gray-800 rounded-lg p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-300 mb-1">Name</label>
                            <input type="text" id="name" name="name" class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email</label>
                            <input type="email" id="email" name="email" class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="subject" class="block text-sm font-medium text-gray-300 mb-1">Subject</label>
                        <input type="text" id="subject" name="subject" class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block text-sm font-medium text-gray-300 mb-1">Message</label>
                        <textarea id="message" name="message" rows="4" class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 text-white px-6 py-3 rounded-md font-semibold hover:bg-blue-700 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    function toggleFaq(button) {
        const content = button.nextElementSibling;
        const icon = button.querySelector('svg');

        content.classList.toggle('hidden');
        icon.classList.toggle('rotate-180');
    }
</script>
@endsection