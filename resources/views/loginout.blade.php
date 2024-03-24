<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <div>
                    <div>

                    @if(Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success')}}
                    </div>
                    @endif
                    @if(Session::get('fail'))
                    <div class="alert alert-success">
                        {{ Session::get('fail')}}
                    </div>
                    @endif
                    <form method="POST" action='add' enctype="multipart/form-data">
                       @csrf
                        <div>
                           <input id="bpm" name="bpm" type="number" placeholder="BPM" required="true" min="60" max="261" oninput="this.reportValidity()" value="{{ old('name') }}" style="width: 350px; height: 30px; border-radius: -30px;">
                            <input id="genre" name="genre" type="text" placeholder="Genre" required="true" value="{{ old('name') }}" style="width: 350px; height: 30px; border-radius: -30px;">
                            <input id="instrument" name="instrument" type="text" placeholder="Main instrument"  value="{{ old('name') }}" style="width: 350px; height: 30px; border-radius: -30px;">
                            <input id="chord" name="chord" type="text" placeholder="chord"  value="{{ old('name') }}" style="width: 350px; height: 30px; border-radius: -30px;">
                            
                            <input id="audio" name="audio" type="file" accept="audio/mp3"  style="width: 350px; height: 30px; border-radius: -30px;">
                            <input id="company" name="company" type="text" placeholder="Company Name"value="{{ old('name') }}"  style="width: 350px; height: 30px; border-radius: -30px;">
                            <textarea id="notes" name="notes" placeholder="Notes" value="{{ old('name') }}" style="width: 1100px; height: 400px; border-radius: -30px;" max="1000" oninput="this.reportValidity()"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">SUBMIT</button>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
