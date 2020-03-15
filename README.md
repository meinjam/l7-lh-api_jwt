# JWT(JSON Web Token) Authentication for Laravel & Lumen

## Getting Started
### Step 1: Install Package
```` composer require tymon/jwt-auth ````

### Step 2: Publish the config
```` php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider" ````

### Step 3: Generate secret key
```` php artisan jwt:secret ````

### Step 4: Update User model App\User.php
<p>
    <code>
        <?php

        namespace App;

        use Tymon\JWTAuth\Contracts\JWTSubject;
        use Illuminate\Notifications\Notifiable;
        use Illuminate\Foundation\Auth\User as Authenticatable;

        class User extends Authenticatable implements JWTSubject
        {
            use Notifiable;

            // Rest omitted for brevity

            /**
             * Get the identifier that will be stored in the subject claim of the JWT.
             *
             * @return mixed
             */
            public function getJWTIdentifier()
            {
                return $this->getKey();
            }

            /**
             * Return a key value array, containing any custom claims to be added to the JWT.
             *
             * @return array
             */
            public function getJWTCustomClaims()
            {
                return [];
            }
        }
    </code>
</p>
<h3>Step 5: Configure Auth guard config/auth.php </h3>
<p>
    <code>
        'defaults' => [
        'guard' => 'api',
        'passwords' => 'users',
        ],

        ...

        'guards' => [
            'api' => [
                'driver' => 'jwt',
                'provider' => 'users',
            ],
        ],
    </code>
</p>
