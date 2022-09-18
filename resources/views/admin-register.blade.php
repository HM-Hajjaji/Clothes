<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register admin</title>
</head>
<body>
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <form action="{{route('admin-register')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div>
            <input type="text" name="name" placeholder="Name" autofocus value="{{old('name')}}">
        </div>
        <div>
            <label for="male">
                <input type="radio" name="sex" id="male" checked value="male"> Male
            </label><br>
            <label for="female">
                <input type="radio" name="sex" id="female" value="female"> Female
            </label>
        </div>
        <div>
            <input type="email" name="email" placeholder="Email" value="{{old('email')}}">
        </div>
        <div>
            <input type="password" name="password" placeholder="Password" >
        </div>
        <div>
            <input type="password" name="password_confirmation" placeholder="Password Confirmation" >
        </div>
        <hr>
        <div>
            <input type="text" name="country" placeholder="country" value="{{old('country')}}">
        </div>
        <div>
            <input type="number" name="phone" placeholder="phone" value="{{old('phone')}}">
        </div>
        <div>
            <input type="text" name="city" placeholder="city" value="{{old('city')}}">
        </div>
        <div>
            <textarea name="address" placeholder="address">
                {{old('address')}}
            </textarea>
        </div>
        <div>
            <input type="number" name="code_postal" placeholder="code postal" value="{{old('code_postal')}}">
        </div>
        <div>
            <input type="url" name="facebook" placeholder="facebook" value="{{old('facebook')}}">
        </div>
        <div>
            <input type="url" name="twitter" placeholder="twitter" value="{{old('twitter')}}">
        </div>
        <div>
            <input type="url" name="instagram" placeholder="instagram" value="{{old('instagram')}}">
        </div>
        <hr>
        <div>
            <input type="text" name="name_website" placeholder="name website" value="{{old('name_website')}}">
        </div>
        <div>
            <textarea name="description" placeholder="description">
                {{old('description')}}
            </textarea>
        </div>
        <div>
            <input type="email" name="email_website" placeholder="email website" value="{{old('email_website')}}">
        </div>
        <div>
            <input type="number" name="phone_website" placeholder="phone website" value="{{old('phone_website')}}">
        </div>
        <div>
            <textarea name="address_website" placeholder="address_website">
                {{old('address_website')}}
            </textarea>
        </div>
        <div>
            <input type="url" name="facebook_website" placeholder="facebook website" value="{{old('facebook_website')}}">
        </div>
        <div>
            <input type="url" name="twitter_website" placeholder="twitter website" value="{{old('twitter_website')}}">
        </div>
        <div>
            <input type="url" name="tiktok_website" placeholder="tiktok_website" value="{{old('tiktok_website')}}">
        </div>
        <div>
            <input type="url" name="instagram_website" placeholder="instagram website" value="{{old('instagram_website')}}">
        </div>
        <hr>
        <div>
            <input type="file" name="photo">
        </div>
        <div>
            <input type="file" name="logo">
        </div>
        <div>
            <input type="file" name="favicon">
        </div>
        <div>
            <button type="submit">Register</button>
        </div>
    </form>
</body>
</html>
