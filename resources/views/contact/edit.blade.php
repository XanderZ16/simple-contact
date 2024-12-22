@extends('layouts.main')

@section('content-box')
    <div class="flex justify-between items-center pt-4 mx-6">
        <a href="/contacts">
            <i class="fa-solid fa-chevron-left fa-lg text-[#B6B6FF] hover:shadow-2xl shadow-sky-600"></i>
        </a>
        <h1 class="font-bold text-xl">Edit Contact</h1>
        <label for="submit">
            <i class="fa-solid fa-check fa-lg text-[#B6B6FF]"></i>
        </label>
    </div>

    <div class="mx-auto w-fit mt-10 mb-8 flex items-center flex-col">
        <label for="photo"
            class="rounded-full w-[120px] h-[120px] bg-[#858585] flex justify-center items-center overflow-hidden group">
            <img src="{{ asset('storage/images/' . $contact->photo) }}" class="w-full h-full object-cover" id="uploadPreview">
            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 0 512 512"
                class="absolute opacity-0 group-hover:opacity-100 transition duration-200 fill-white hover">
                <path
                    d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
            </svg>
        </label>
        <label for="photo">
            <h2 class="mt-6 box-border py-2 px-4 rounded-2xl bg-[#434343] hover:bg-[#6a6a6a] hover:cursor-pointer">
                @if ($contact->photo == null)
                    Add Photo
                @else
                    Change Photo
                @endif
            </h2>
        </label>
    </div>

    <div>
        <form enctype="multipart/form-data" action="/contacts/{{ $contact->id }}" method="POST">
            @method('PUT')
            @csrf
            <input type="file" name="photo" id="photo" class="hidden" onchange="PreviewImage();">
            <div class="flex px-6 justify-end w-full flex-wrap gap-8">
                <div class="w-full flex items-center">
                    <label for="name" class="w-[15%]">
                        <i class="fa-regular fa-id-card h-fit"></i>
                    </label>
                    <input value="{{ $contact->first_name }}" id="name" type="text" name="first_name"
                        placeholder="First Name"
                        class="w-[85%] bg-transparent border-b-2 border-[#DEDEDE] focus:outline-none placeholder:pl-1"
                        required>
                </div>
                <input value="{{ $contact->last_name }}" type="text" name="last_name" placeholder="Last Name"
                    class="w-[85%] bg-transparent border-b-2 border-[#DEDEDE] focus:outline-none placeholder:pl-1" required>

                <div class="w-full flex items-center">
                    <label for="number" class="w-[15%]">
                        <i class="fa-solid fa-phone h-fit"></i>
                    </label>
                    <input value="{{ $contact->number }}" id="number" type="text" name="number" placeholder="Number"
                        class="w-[85%] bg-transparent border-b-2 border-[#DEDEDE] focus:outline-none placeholder:pl-1"
                        required>
                </div>
                <div class="w-[85%]">
                    <select name="contact_type" id=""
                        class="bg-transparent border-b-2 border-[#DEDEDE] focus:outline-none min-w-[40%] text-white">
                        <option value="ponsel" class="bg-[#434343]">Ponsel</option>
                        <option value="rumah" class="bg-[#434343]">Rumah</option>
                        <option value="teman" class="bg-[#434343]">Teman</option>
                    </select>
                </div>

                <div class="w-full flex items-center">
                    <label for="email" class="w-[15%]">
                        <i class="fa-solid fa-envelope h-fit"></i>
                    </label>
                    <input id="email" name="email" type="email" placeholder="E-Mail"
                        class="w-[85%] bg-transparent border-b-2 border-[#DEDEDE] focus:outline-none placeholder:pl-1"
                        required value="{{ $contact->email }}">
                </div>
                <div class="w-[85%]">
                    <select name="email_type" id=""
                        class="bg-transparent border-b-2 border-[#DEDEDE] focus:outline-none min-w-[40%] text-white">
                        <option value="ponsel" class="bg-[#434343]">Ponsel</option>
                        <option value="rumah" class="bg-[#434343]">Rumah</option>
                        <option value="teman" class="bg-[#434343]"d>Teman</option>
                    </select>
                </div>

                <div class="w-full flex items-center">
                    <label for="address" class="w-[15%]">
                        <i class="fa-solid fa-house h-fit"></i>
                    </label>
                    <input id="address" name="address" type="text" placeholder="Home"
                        class="w-[85%] bg-transparent border-b-2 border-[#DEDEDE] focus:outline-none placeholder:pl-1"
                        value="{{ $contact->address }}" required>
                </div>
                <div class="w-full flex items-center">
                    <label for="notes" class="w-[15%]">
                        <i class="fa-solid fa-newspaper h-fit"></i>
                    </label>
                    <input id="notes" name="notes" type="text" placeholder="Notes"
                        class="w-[85%] bg-transparent border-b-2 border-[#DEDEDE] focus:outline-none placeholder:pl-1"
                        value="{{ $contact->notes }}" required>
                </div>
            </div>
            <button type="submit" id="submit" class="hidden"></button>
        </form>
    </div>

    <script>
        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("photo").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;
            };
        };
    </script>
@endsection
