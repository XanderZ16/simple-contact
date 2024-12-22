@extends('layouts.main')

@section('content-box')
    @if (session()->has('updated'))
        <h1 id="alert-box"
            class="absolute w-[90%] mx-[5%] mt-[5%] text-center px-6 py-3 bg-green-500 rounded-md z-10 flex justify-around items-center transition duration-500">
            Account Updated !!
            <span class="bg-green-600 px-3 py-2 rounded-md hover:bg-green-700 hover:cursor-pointer"
                onclick="document.getElementById('alert-box').classList.add('-translate-y-[150%]');">Close</span>
        </h1>
    @endif
    <div>
        <div class="grid grid-cols-3 mt-4 font-semibold">
            <a href="{{ route('contacts.index') }}"
                class="text-center mx-auto my-auto text-white hover:text-[#B6B6FF]">Home</a>
            <h2 class="text-xl text-center mx-auto my-auto">{{ $contact->nama_depan }} {{ $contact->nama_belakang }}</h2>
            <a href="{{ route('contacts.edit', $contact) }}"
                class="text-center mx-auto my-auto text-white hover:text-[#B6B6FF]">Edit</a>
        </div>


        @if (session()->has('success'))
            <div class="pt-10 mx-auto text-center">
                <span class="text-center text-green font-bold text-xl mx-auto w-full">
                    Kontak Berhasil Dirubah!
                </span>
            </div>
        @endif

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

        <div class="py-10 mx-auto">
            <div class="h-52 w-52 bg-gray-400 mx-auto rounded-full overflow-hidden">
                <img src="
                @if ($contact->photo != null)
                {{ asset('storage/images/' . $contact->photo) }}
                @else
                /default/profile.png 
                @endif"
                class="w-full h-full object-cover">
            </div>
            <div class="w-full text-center mx-auto pt-5">
                <h2 class="text-center text-white font-bold py-2 px-4 rounded-full bg-[#2D2D2D] w-fit mx-auto">
                    {{ $contact->first_name }}&nbsp;{{ $contact->last_name }}
                </h2>
            </div>
            <div class="pt-10 px-5 flex flex-col gap-2">
                <div class="bg-[#2D2D2D] rounded-lg px-5 py-3 flex flex-col mb-4 hover:bg-[#7b7b7b]">
                    <span class="text-gray-400 text-xs">Phone</span>
                    <span>{{ $contact->number }}</span>
                </div>
                <div class="bg-[#2D2D2D] rounded-lg px-5 py-3 flex flex-col mb-4 hover:bg-[#7b7b7b]">
                    <span class="text-gray-400 text-xs">Address</span>
                    <span>
                        @if ($contact->address == null)
                            Address Not Added
                        @else
                            {{ $contact->address }}
                        @endif
                    </span>
                </div>
                <div class="bg-[#2D2D2D] rounded-lg px-5 py-3 flex flex-col mb-4 hover:bg-[#7b7b7b]">
                    <span class="text-gray-400 text-xs">Notes</span>
                    @if ($contact->notes == null)
                        Notes Not Added
                    @else
                        {{ $contact->notes }}
                    @endif
                </div>

                <div class="bg-[434343] rounded-lg px-5 py-3 flex flex-col divide-y divide-gray">
                    <span class="py-1 hover:cursor-pointer hover:text-white text-[#B6B6FF]"><a
                            href="tel:{{ $contact->number }}">Call this Number</a></span>
                    <form action="/contacts/{{ $contact->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 py-1 hover:cursor-pointer hover:text-white">Delete
                            Contact</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
