@extends('layouts.main')

@section('content-box')
    @if (session()->has('created'))
        <h1 id="alert-box"
            class="absolute w-[90%] mx-[5%] mt-[5%] text-center px-6 py-3 bg-green-500 rounded-md z-10 flex justify-around items-center transition duration-500">
            Account Created !!
            <span class="bg-green-600 px-3 py-2 rounded-md hover:bg-green-700 hover:cursor-pointer"
                onclick="document.getElementById('alert-box').classList.add('-translate-y-[150%]');">Close</span>
        </h1>
    @endif
    @if (session()->has('deleted'))
        <h1 id="alert-box"
            class="absolute w-[90%] ml-[5%] mt-[5%] text-center px-6 py-3 bg-red-500 rounded-md z-10 flex justify-around items-center transition duration-500">
            Account Deleted !!
            <span class="bg-red-600 px-3 py-2 rounded-md hover:bg-red-700 hover:cursor-pointer"
                onclick="document.getElementById('alert-box').classList.add('-translate-y-[150%]');">Close</span>
        </h1>
    @endif

    <h1 class="font-bold text-xl mx-auto w-fit pt-4 pb-6">Contact List</h1>
    <a href="/contacts/create">
        <i class="fa-solid fa-plus absolute top-6 right-6"></i>
    </a>
    <form action="/contacts" class="w-[90%] mx-auto" method="GET">
        <input value="{{ $search }}" type="text" placeholder="Search" name="search"
            class="w-full bg-[#434343] placeholder:pl-4 p-2 rounded-xl">
    </form>

    @if ($contacts->isEmpty())
        <div class="mt-56 mx-auto flex flex-col items-center justify-center gap-2">
            @if ($search)
                <h2 class="text-2xl text-center">{{ $search }} Not Found</h2>
            @else
                <h2 class="text-2xl text-center">There's No Contact Here</h2>
            @endif
            <a href="/contacts/create" class="underline text-[#DEDEDE] hover:text-[#aeaeae]">Add new contact</a>
        </div>
    @else
        <div class="w-[90%] mx-auto mt-6 relative">
            <h6 class="absolute text-sm text-[#5c5b5b] -right-3 flex flex-col items-center">
                <span>A</span><span>B</span><span>C</span><span>D</span><span>E</span><span>F</span><span>G</span><span>H</span><span>I</span><span>J</span><span>K</span><span>L</span><span>M</span><span>N</span><span>O</span><span>P</span><span>Q</span><span>R</span><span>S</span><span>T</span><span>U</span><span>V</span><span>W</span><span>X</span><span>Y</span><span>Z</span>
            </h6>
            <div class="w-[90%]">
                @foreach ($contacts as $first_letter => $contact)
                    <h6 class="text-[#777777]">{{ $first_letter }}</h6>
                    <hr class="mt-1 mb-4">
                    @foreach ($contact as $contact_detail)
                        <div class="my-4 hover:bg-[#2D2D2D] rounded-3xl p-2 hover:cursor-pointer group-[contact]">
                            <a href="/contacts/{{ $contact_detail->id }}" class="flex justify-between">
                                <div class="flex gap-3">
                                    <img src="@if ($contact_detail->photo != null) {{ asset('storage/images/' . $contact_detail->photo) }}
                                    @else
                                    /default/profile.png @endif"
                                        class="rounded-full w-12 h-12 object-cover">
                                    <div>
                                        <h4 class="group-[contact]-hover">{{ $contact_detail->first_name }}</h4>
                                        <h4 class="text-[#777777]">{{ $contact_detail->number }}</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    @endif
    @include('layouts.appbar')
@endsection
