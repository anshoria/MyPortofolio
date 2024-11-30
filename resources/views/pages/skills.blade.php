@extends('layouts.app')

@section('title', 'Skills')
@section('content')
<!-- Hero Section -->
<div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 pt-24 pb-10">
  <!-- Title -->
  <div class="mx-auto max-w-2xl mb-16 text-center">
    <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">Skills & Expertise</h2>
    <p class="mt-4 text-lg text-gray-600 dark:text-gray-400">Continuously learning and improving my technical capabilities</p>
  </div>
  <!-- End Title -->

  <!-- Grid -->
  <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($skills as $category => $items)
    <!-- Card -->
    <div class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-700 dark:shadow-slate-700/[.7]">
      <div class="h-52 flex flex-col justify-center items-center bg-blue-50 rounded-t-xl dark:bg-slate-800">
        <svg class="w-16 h-16 text-blue-500 dark:text-blue-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
          <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
        </svg>
      </div>
      <div class="p-6">
        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-300">
          {{ $category }}
        </h3>
        <div class="mt-4">
          <div class="flex flex-wrap gap-2">
            @foreach($items as $skill)
            <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-800/30 dark:text-blue-500">
              {{ $skill }}
            </span>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <!-- End Card -->
    @endforeach
  </div>
  <!-- End Grid -->

  <!-- Progress Section -->
  <div class="max-w-4xl mx-auto mt-20">
    <h3 class="text-xl font-bold md:text-2xl md:leading-tight dark:text-white mb-8 text-center">Proficiency Levels</h3>
    
    <!-- Progress Bars -->
    <div class="space-y-6">
      <!-- Frontend Development -->
      <div class="flex flex-col">
        <div class="flex justify-between mb-2">
          <span class="text-sm font-medium text-gray-800 dark:text-gray-200">Frontend Development</span>
          <span class="text-sm font-medium text-gray-800 dark:text-gray-200">90%</span>
        </div>
        <div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden dark:bg-gray-700">
          <div class="flex flex-col justify-center overflow-hidden bg-blue-600 dark:bg-blue-500" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>

      <!-- Backend Development -->
      <div class="flex flex-col">
        <div class="flex justify-between mb-2">
          <span class="text-sm font-medium text-gray-800 dark:text-gray-200">Backend Development</span>
          <span class="text-sm font-medium text-gray-800 dark:text-gray-200">85%</span>
        </div>
        <div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden dark:bg-gray-700">
          <div class="flex flex-col justify-center overflow-hidden bg-blue-600 dark:bg-blue-500" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>

      <!-- Database Management -->
      <div class="flex flex-col">
        <div class="flex justify-between mb-2">
          <span class="text-sm font-medium text-gray-800 dark:text-gray-200">Database Management</span>
          <span class="text-sm font-medium text-gray-800 dark:text-gray-200">80%</span>
        </div>
        <div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden dark:bg-gray-700">
          <div class="flex flex-col justify-center overflow-hidden bg-blue-600 dark:bg-blue-500" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>

      <!-- DevOps -->
      <div class="flex flex-col">
        <div class="flex justify-between mb-2">
          <span class="text-sm font-medium text-gray-800 dark:text-gray-200">DevOps</span>
          <span class="text-sm font-medium text-gray-800 dark:text-gray-200">75%</span>
        </div>
        <div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden dark:bg-gray-700">
          <div class="flex flex-col justify-center overflow-hidden bg-blue-600 dark:bg-blue-500" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
    </div>
    <!-- End Progress Bars -->
  </div>
  <!-- End Progress Section -->
</div>
@endsection

@push('scripts')
<script>
  // Initialize any Preline JS components
  document.addEventListener('DOMContentLoaded', () => {
    HSStaticMethods.autoInit();
  });
</script>
@endpush