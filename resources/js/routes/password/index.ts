import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../wayfinder'
import confirm from './confirm'
/**
* @see \Laravel\Fortify\Http\Controllers\PasswordResetLinkController::email
 * @see vendor/laravel/fortify/src/Http/Controllers/PasswordResetLinkController.php:30
 * @route '/forgot-password'
 */
export const email = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: email.url(options),
    method: 'post',
})

email.definition = {
    methods: ["post"],
    url: '/forgot-password',
} satisfies RouteDefinition<["post"]>

/**
* @see \Laravel\Fortify\Http\Controllers\PasswordResetLinkController::email
 * @see vendor/laravel/fortify/src/Http/Controllers/PasswordResetLinkController.php:30
 * @route '/forgot-password'
 */
email.url = (options?: RouteQueryOptions) => {
    return email.definition.url + queryParams(options)
}

/**
* @see \Laravel\Fortify\Http\Controllers\PasswordResetLinkController::email
 * @see vendor/laravel/fortify/src/Http/Controllers/PasswordResetLinkController.php:30
 * @route '/forgot-password'
 */
email.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: email.url(options),
    method: 'post',
})

    /**
* @see \Laravel\Fortify\Http\Controllers\PasswordResetLinkController::email
 * @see vendor/laravel/fortify/src/Http/Controllers/PasswordResetLinkController.php:30
 * @route '/forgot-password'
 */
    const emailForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: email.url(options),
        method: 'post',
    })

            /**
* @see \Laravel\Fortify\Http\Controllers\PasswordResetLinkController::email
 * @see vendor/laravel/fortify/src/Http/Controllers/PasswordResetLinkController.php:30
 * @route '/forgot-password'
 */
        emailForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: email.url(options),
            method: 'post',
        })
    
    email.form = emailForm
/**
* @see \App\Http\Controllers\AuthController::email
 * @see app/Http/Controllers/AuthController.php:94
 * @route '/password/email'
 */
export const sendResetLink = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: sendResetLink.url(options),
    method: 'post',
})

sendResetLink.definition = {
    methods: ["post"],
    url: '/password/email',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\AuthController::email
 * @see app/Http/Controllers/AuthController.php:94
 * @route '/password/email'
 */
sendResetLink.url = (options?: RouteQueryOptions) => {
    return sendResetLink.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\AuthController::email
 * @see app/Http/Controllers/AuthController.php:94
 * @route '/password/email'
 */
sendResetLink.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: sendResetLink.url(options),
    method: 'post',
})

    /**
* @see \App\Http\Controllers\AuthController::email
 * @see app/Http/Controllers/AuthController.php:94
 * @route '/password/email'
 */
    const sendResetLinkForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: sendResetLink.url(options),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\AuthController::email
 * @see app/Http/Controllers/AuthController.php:94
 * @route '/password/email'
 */
        sendResetLinkForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: sendResetLink.url(options),
            method: 'post',
        })
    
    sendResetLink.form = sendResetLinkForm
/**
* @see \Laravel\Fortify\Http\Controllers\NewPasswordController::update
 * @see vendor/laravel/fortify/src/Http/Controllers/NewPasswordController.php:55
 * @route '/reset-password'
 */
export const update = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: update.url(options),
    method: 'post',
})

update.definition = {
    methods: ["post"],
    url: '/reset-password',
} satisfies RouteDefinition<["post"]>

/**
* @see \Laravel\Fortify\Http\Controllers\NewPasswordController::update
 * @see vendor/laravel/fortify/src/Http/Controllers/NewPasswordController.php:55
 * @route '/reset-password'
 */
update.url = (options?: RouteQueryOptions) => {
    return update.definition.url + queryParams(options)
}

/**
* @see \Laravel\Fortify\Http\Controllers\NewPasswordController::update
 * @see vendor/laravel/fortify/src/Http/Controllers/NewPasswordController.php:55
 * @route '/reset-password'
 */
update.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: update.url(options),
    method: 'post',
})

    /**
* @see \Laravel\Fortify\Http\Controllers\NewPasswordController::update
 * @see vendor/laravel/fortify/src/Http/Controllers/NewPasswordController.php:55
 * @route '/reset-password'
 */
    const updateForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: update.url(options),
        method: 'post',
    })

            /**
* @see \Laravel\Fortify\Http\Controllers\NewPasswordController::update
 * @see vendor/laravel/fortify/src/Http/Controllers/NewPasswordController.php:55
 * @route '/reset-password'
 */
        updateForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: update.url(options),
            method: 'post',
        })
    
    update.form = updateForm
/**
* @see \App\Http\Controllers\AuthController::update
 * @see app/Http/Controllers/AuthController.php:112
 * @route '/password/reset'
 */
export const resetPassword = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: update.url(options),
    method: 'post',
})

resetPassword.definition = {
    methods: ["post"],
    url: '/password/reset',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\AuthController::update
 * @see app/Http/Controllers/AuthController.php:112
 * @route '/password/reset'
 */
resetPassword.url = (options?: RouteQueryOptions) => {
    return resetPassword.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\AuthController::update
 * @see app/Http/Controllers/AuthController.php:112
 * @route '/password/reset'
 */
resetPassword.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: resetPassword.url(options),
    method: 'post',
})

    /**
* @see \App\Http\Controllers\AuthController::update
 * @see app/Http/Controllers/AuthController.php:112
 * @route '/password/reset'
 */
    const resetPasswordForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: resetPassword.url(options),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\AuthController::update
 * @see app/Http/Controllers/AuthController.php:112
 * @route '/password/reset'
 */
        resetPasswordForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: resetPassword.url(options),
            method: 'post',
        })
    
    resetPassword.form = resetPasswordForm
/**
* @see \Laravel\Fortify\Http\Controllers\ConfirmedPasswordStatusController::confirmation
 * @see vendor/laravel/fortify/src/Http/Controllers/ConfirmedPasswordStatusController.php:17
 * @route '/user/confirmed-password-status'
 */
export const confirmation = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: confirmation.url(options),
    method: 'get',
})

confirmation.definition = {
    methods: ["get","head"],
    url: '/user/confirmed-password-status',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \Laravel\Fortify\Http\Controllers\ConfirmedPasswordStatusController::confirmation
 * @see vendor/laravel/fortify/src/Http/Controllers/ConfirmedPasswordStatusController.php:17
 * @route '/user/confirmed-password-status'
 */
confirmation.url = (options?: RouteQueryOptions) => {
    return confirmation.definition.url + queryParams(options)
}

/**
* @see \Laravel\Fortify\Http\Controllers\ConfirmedPasswordStatusController::confirmation
 * @see vendor/laravel/fortify/src/Http/Controllers/ConfirmedPasswordStatusController.php:17
 * @route '/user/confirmed-password-status'
 */
confirmation.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: confirmation.url(options),
    method: 'get',
})
/**
* @see \Laravel\Fortify\Http\Controllers\ConfirmedPasswordStatusController::confirmation
 * @see vendor/laravel/fortify/src/Http/Controllers/ConfirmedPasswordStatusController.php:17
 * @route '/user/confirmed-password-status'
 */
confirmation.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: confirmation.url(options),
    method: 'head',
})

    /**
* @see \Laravel\Fortify\Http\Controllers\ConfirmedPasswordStatusController::confirmation
 * @see vendor/laravel/fortify/src/Http/Controllers/ConfirmedPasswordStatusController.php:17
 * @route '/user/confirmed-password-status'
 */
    const confirmationForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: confirmation.url(options),
        method: 'get',
    })

            /**
* @see \Laravel\Fortify\Http\Controllers\ConfirmedPasswordStatusController::confirmation
 * @see vendor/laravel/fortify/src/Http/Controllers/ConfirmedPasswordStatusController.php:17
 * @route '/user/confirmed-password-status'
 */
        confirmationForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: confirmation.url(options),
            method: 'get',
        })
            /**
* @see \Laravel\Fortify\Http\Controllers\ConfirmedPasswordStatusController::confirmation
 * @see vendor/laravel/fortify/src/Http/Controllers/ConfirmedPasswordStatusController.php:17
 * @route '/user/confirmed-password-status'
 */
        confirmationForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: confirmation.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    confirmation.form = confirmationForm
/**
* @see \App\Http\Controllers\AuthController::request
 * @see app/Http/Controllers/AuthController.php:89
 * @route '/password/reset'
 */
export const request = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: request.url(options),
    method: 'get',
})

request.definition = {
    methods: ["get","head"],
    url: '/password/reset',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\AuthController::request
 * @see app/Http/Controllers/AuthController.php:89
 * @route '/password/reset'
 */
request.url = (options?: RouteQueryOptions) => {
    return request.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\AuthController::request
 * @see app/Http/Controllers/AuthController.php:89
 * @route '/password/reset'
 */
request.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: request.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\AuthController::request
 * @see app/Http/Controllers/AuthController.php:89
 * @route '/password/reset'
 */
request.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: request.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\AuthController::request
 * @see app/Http/Controllers/AuthController.php:89
 * @route '/password/reset'
 */
    const requestForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: request.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\AuthController::request
 * @see app/Http/Controllers/AuthController.php:89
 * @route '/password/reset'
 */
        requestForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: request.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\AuthController::request
 * @see app/Http/Controllers/AuthController.php:89
 * @route '/password/reset'
 */
        requestForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: request.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    request.form = requestForm
/**
* @see \App\Http\Controllers\AuthController::reset
 * @see app/Http/Controllers/AuthController.php:107
 * @route '/password/reset/{token}'
 */
export const reset = (args: { token: string | number } | [token: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: reset.url(args, options),
    method: 'get',
})

reset.definition = {
    methods: ["get","head"],
    url: '/password/reset/{token}',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\AuthController::reset
 * @see app/Http/Controllers/AuthController.php:107
 * @route '/password/reset/{token}'
 */
reset.url = (args: { token: string | number } | [token: string | number ] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { token: args }
    }

    
    if (Array.isArray(args)) {
        args = {
                    token: args[0],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        token: args.token,
                }

    return reset.definition.url
            .replace('{token}', parsedArgs.token.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\AuthController::reset
 * @see app/Http/Controllers/AuthController.php:107
 * @route '/password/reset/{token}'
 */
reset.get = (args: { token: string | number } | [token: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: reset.url(args, options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\AuthController::reset
 * @see app/Http/Controllers/AuthController.php:107
 * @route '/password/reset/{token}'
 */
reset.head = (args: { token: string | number } | [token: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: reset.url(args, options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\AuthController::reset
 * @see app/Http/Controllers/AuthController.php:107
 * @route '/password/reset/{token}'
 */
    const resetForm = (args: { token: string | number } | [token: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: reset.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\AuthController::reset
 * @see app/Http/Controllers/AuthController.php:107
 * @route '/password/reset/{token}'
 */
        resetForm.get = (args: { token: string | number } | [token: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: reset.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\AuthController::reset
 * @see app/Http/Controllers/AuthController.php:107
 * @route '/password/reset/{token}'
 */
        resetForm.head = (args: { token: string | number } | [token: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: reset.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    reset.form = resetForm
const password = {
    email,
    sendResetLink,
    update,
    resetPassword,
    confirmation,
    confirm,
    request,
    reset,
}

export default password