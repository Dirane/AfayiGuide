<div class="mb-6">
    <div class="flex items-center justify-between mb-2">
        <p class="text-sm text-gray-600">There are just 5 steps</p>
        <p class="text-sm font-medium text-gray-800">Step {{ $currentStep }} of 5</p>
    </div>
    <div class="w-full bg-gray-200 rounded-full h-2.5">
        <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ min(100, max(0, round(($currentStep/5)*100))) }}%"></div>
    </div>
    <div class="mt-1 text-xs text-gray-500">{{ min(100, max(0, round(($currentStep/5)*100))) }}% complete</div>
    </div>


