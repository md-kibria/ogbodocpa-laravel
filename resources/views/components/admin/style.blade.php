{{-- <style>
        * {
            font-family: 'Outfit', sans-serif;
            outline: none;
            box-sizing: border-box;
            overflow-x: hidden;
        }

        #pagi .text-gray-700 {
            color: #64748b !important;
        }

        #pagi span .text-gray-700 {
            color: #374151 !important;
        }
    </style> --}}

<style>
        * {
            font-family: 'Outfit', sans-serif;
            outline: none;
            box-sizing: border-box;
        }

        body {
            overflow-x: hidden;
        }

        /* .container {
            max-width: 1270px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 20px;
            padding-right: 20px;
        } */


        .hp {
            width: 40px;
            height: 40px;
        }

        .img {
            object-fit: cover;
            color: #333333bb;
        }


        .sig {
            height: 430px;
            background-image: linear-gradient(to bottom right, #8080D7, #AAD9D9);
        }

        @media screen and (min-width: 300px) {
            .container {
                padding-left: 5px;
                padding-right: 5px;
            }
        }

        @media screen and (min-width: 500px) {
            .container {
                padding-left: 7px;
                padding-right: 7px;
            }
        }

        #pagi .text-gray-700 {
            color: #64748b !important;
        }

        #pagi span .text-gray-700 {
            color: #374151 !important;
        }


        /* Loader */
        .loader {
            width: 8px;
            height: 40px;
            border-radius: 4px;
            display: block;
            margin: 20px auto;
            position: relative;
            background: currentColor;
            color: #FFF;
            box-sizing: border-box;
            animation: animloader 0.3s 0.3s linear infinite alternate;
        }

        .loader::after,
        .loader::before {
            content: '';
            width: 8px;
            height: 40px;
            border-radius: 4px;
            background: currentColor;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 20px;
            box-sizing: border-box;
            animation: animloader 0.3s 0.45s linear infinite alternate;
        }

        .loader::before {
            left: -20px;
            animation-delay: 0s;
        }

        @keyframes animloader {
            0% {
                height: 48px
            }

            100% {
                height: 4px
            }
        }

        /* Loader */


        .fre-item::before {
            content: '';
            height: 26px;
            width: 26px;
            background-color: #AAD9D9;
            display: block;
            border-radius: 50%;
            position: absolute;
            left: -16px;
            top: 5px;
        }

        .fre-item::after {
            content: '';
            height: 18px;
            width: 18px;
            background-color: #000;
            display: block;
            border-radius: 50%;
            position: absolute;
            left: -12px;
            top: 9px;
        }
    </style>