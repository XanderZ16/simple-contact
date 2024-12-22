@extends('layouts.main')

@section('content-box')
    <div class="flex justify-between items-center pt-4 mx-6">
        <a href="/contacts">
            <i class="fa-solid fa-chevron-left fa-lg text-[#B6B6FF] hover:shadow-2xl shadow-sky-600"></i>
        </a>
        <h1 class="font-bold text-xl">New Contact</h1>
        <label for="submit">
            <i class="fa-solid fa-check fa-lg text-[#B6B6FF]"></i>
        </label>
    </div>

    <form enctype="multipart/form-data" method="POST" action="/contacts">
        @csrf
        <div class="mx-auto w-fit mt-10 mb-8 flex items-center flex-col">
            <label for="photo"
                class="rounded-full w-[120px] h-[120px] bg-[#858585] flex justify-center items-center overflow-hidden group">
                <img src="w-full h-full" id="uploadPreview" class="hidden">
                <svg xmlns="http://www.w3.org/2000/svg" height="80px" viewBox="0 0 448 512" fill="white"
                    class="group-hover:opacity-30 transition duration-200">
                    <path
                        d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 0 512 512"
                    class="absolute opacity-0 group-hover:opacity-100 transition duration-200">
                    <path
                        d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                </svg>
            </label>
            <label for="photo">
                <h2 class="mt-6 box-border py-2 px-4 rounded-2xl bg-[#434343] hover:bg-[#6a6a6a] hover:cursor-pointer">Add
                    Photo
                </h2>
            </label>
        </div>

        <input type="file" name="photo" id="photo" class="hidden" onchange="PreviewImage();">
        <div class="flex px-6 justify-end w-full flex-wrap gap-8">
            <div class="w-full flex items-center">
                <label for="name" class="w-[15%] w">
                    <i class="fa-regular fa-id-card h-fit"></i>
                </label>
                <input id="name" type="text" name="first_name" placeholder="First Name"
                    class="w-[85%] bg-transparent border-b-2 border-[#DEDEDE] focus:outline-none placeholder:pl-1" required>
            </div>
            <input type="text" name="last_name" placeholder="Last Name"
                class="w-[85%] bg-transparent border-b-2 border-[#DEDEDE] focus:outline-none placeholder:pl-1" required>

            <div class="w-full flex items-center">
                <label for="name" class="w-[15%]">
                    <i class="fa-solid fa-phone h-fit"></i>
                </label>
                <input type="text" name="number" placeholder="Number"
                    class="w-[85%] bg-transparent border-b-2 border-[#DEDEDE] focus:outline-none placeholder:pl-1" required>
            </div>
            <div class="w-[85%]">
                <select name="number_type" id=""
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
                <input name="email" type="email" placeholder="E-Mail" id="email"
                    class="w-[85%] bg-transparent border-b-2 border-[#DEDEDE] focus:outline-none placeholder:pl-1" required>
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
                    class="w-[85%] bg-transparent border-b-2 border-[#DEDEDE] focus:outline-none placeholder:pl-1">
            </div>
            <div class="w-full flex items-center">
                <label for="notes" class="w-[15%]">
                    <i class="fa-solid fa-newspaper h-fit"></i>
                </label>
                <input id="notes" name="notes" type="text" placeholder="Notes"
                    class="w-[85%] bg-transparent border-b-2 border-[#DEDEDE] focus:outline-none placeholder:pl-1">
            </div>
        </div>
        <button type="submit" id="submit" class="hidden"></button>
    </form>

    <script>
        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("photo").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;
                document.getElementById("uploadPreview").classList.remove('hidden')
            };
        };
    </script>
@endsection
