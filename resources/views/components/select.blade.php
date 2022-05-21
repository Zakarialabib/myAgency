<div class="relative inline-block w-60 mr-2 align-middle select-none transition duration-200 ease-in">
    <select name="{{$name}}" id="{{$id}}" @if($checked) checked @endif {{ $attributes->merge(['class'=>"form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"])}}/>
        <option name="{{$name}}" value='{{App\Models\ORDER::STATUS_PENDING}}'>{{ __('Pending') }}</option>
        <option name="{{$name}}" value='{{App\Models\ORDER::STATUS_PROCESSING}}'>{{ __('Processing') }}</option>
        <option name="{{$name}}" value='{{App\Models\ORDER::STATUS_COLLECTING}}'>{{ __('Collecting') }}</option>
        <option name="{{$name}}" value='{{App\Models\ORDER::STATUS_CONFIRMED}}'>{{ __('Confirmed') }}</option>
        <option name="{{$name}}" value='{{App\Models\ORDER::STATUS_SHIPPING}}'>{{ __('Shipping') }}</option>
        <option name="{{$name}}" value='{{App\Models\ORDER::STATUS_CANCELED}}'>{{ __('Canceled') }}</option>
        <option name="{{$name}}" value='{{App\Models\ORDER::STATUS_COMPLETED}}'>{{ __('Completed') }}</option>
        <option name="{{$name}}" value='{{App\Models\ORDER::STATUS_RETURNED}}'>{{ __('Returned') }}</option>
        <option name="{{$name}}" value='{{App\Models\ORDER::STATUS_PAID}}'>{{ __('PAID') }}</option>   
        <label for="{{$id}}" class="block overflow-hidden h-6 rounded-full bg-zinc-300 cursor-pointer"></label>
    </select>
</div>