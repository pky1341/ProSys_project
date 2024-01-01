<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="bg-gray-800">
    <div class="container max-w-xs mx-auto p-4 bg-gray-900 bg-opacity-60 rounded-md">
        <form>
            <label class="font-bold block mb-4" for="arquivo">Upload Aadhar:</label>
            <input accept=".jpg, .jpeg, .png, .gif, .pdf" class="p-3 mb-6 border-none bg-blue-500 rounded-md w-full cursor-pointer transition duration-300 hover:bg-blue-700"
                name="arquivo" id="arquivo" type="file">
        </form>
    </div>
</body>

</html>
