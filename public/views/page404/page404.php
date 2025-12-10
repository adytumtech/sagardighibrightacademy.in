<?php if($_SERVER['REQUEST_URI'] == $_SERVER['PHP_SELF']) header("Location: home"); ?>

<section class="flex md:h-screen md:items-center text-center">
    <div class="w-full">

        <div class="relative w-full">
            <div class="absolute top-0 w-72 h-72 bg-orange-300 rounded-full mix-blend-multiply filter blur-xl opacity-10 md:opacity-20"></div>
            <div class="absolute top-0 -right-4 w-72 h-72 bg-red-300 rounded-full mix-blend-multiply filter blur-xl opacity-10 md:opacity-20"></div>
            <div class="absolute top-10 -bottom-8 left-20 w-72 h-72 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl opacity-10 md:opacity-20"></div>
        </div>

        <h1 class="text-4xl md:text-7xl mt-2 font-bold relative">
            <p>The page you are 
                <span class='text-gradient bg-gradient-to-r from-orange-400 to-red-500'> looking for</span>
            </p>  
            <p class="p-3"> Doesn't
                <span class='text-gradient bg-gradient-to-r from-orange-400 to-red-500'> exist.</span>
            </p>
        </h1>
    </div>
</section>