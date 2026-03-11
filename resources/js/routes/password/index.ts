import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../wayfinder'
import confirm from './confirm'

/**
* @see \Laravel\Fortify\Http\Controllers\PasswordResetLinkController::email
 * @see vendor/laravel/fortify/src/Http/Controllers/PasswordResetLinkController.php:30
 * @route '/forgot-password'
 */
export const forgotEmail = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: forgotEmail.url(options),
    method: 'post',
})

forgotEmail.definition = {
    methods: ["post"],
    url: '/forgot-password',
} satisfies RouteDefinition<["post"]>

forgotEmail.url = (options?: RouteQueryOptions) => {
    return forgotEmail.definition.url + queryParams(options)
}

forgotEmail.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: forgotEmail.url(options),
    method: 'post',
})

const forgotEmailForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: forgotEmail.url(options),
    method: 'post',
})

forgotEmailForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: forgotEmail.url(options),
    method: 'post',
})

forgotEmail.form = forgotEmailForm

/**
* @see \App\Http\Controllers\AuthController::email
 * @see app/Http/Controllers/AuthController.php:94
 * @route '/password/email'
 */
export const email = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: email.url(options),
    method: 'post',
})

email.definition = {
    methods: ["post"],
    url: '/password/email',
} satisfies RouteDefinition<["post"]>

email.url = (options?: RouteQueryOptions) => {
    return email.definition.url + queryParams(options)
}

email.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: email.url(options),
    method: 'post',
})

const emailForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: email.url(options),
    method: 'post',
})

emailForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: email.url(options),
    method: 'post',
})

email.form = emailForm

/**
* @see \Laravel\Fortify\Http\Controllers\NewPasswordController::update
 * @see vendor/laravel/fortify/src/Http/Controllers/NewPasswordController.php:55
 * @route '/reset-password'
 */
export const resetUpdate = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: resetUpdate.url(options),
    method: 'post',
})

resetUpdate.definition = {
    methods: ["post"],
    url: '/reset-password',
} satisfies RouteDefinition<["post"]>

resetUpdate.url = (options?: RouteQueryOptions) => {
    return resetUpdate.definition.url + queryParams(options)
}

resetUpdate.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: resetUpdate.url(options),
    method: 'post',
})

const resetUpdateForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: resetUpdate.url(options),
    method: 'post',
})

resetUpdateForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: resetUpdate.url(options),
    method: 'post',
})

resetUpdate.form = resetUpdateForm

/**
* @see \App\Http\Controllers\AuthController::update
 * @see app/Http/Controllers/AuthController.php:112
 * @route '/password/reset'
 */
export const update = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: update.url(options),
    method: 'post',
})

update.definition = {
    methods: ["post"],
    url: '/password/reset',
} satisfies RouteDefinition<["post"]>

update.url = (options?: RouteQueryOptions) => {
    return update.definition.url + queryParams(options)
}

update.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: update.url(options),
    method: 'post',
})

const updateForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: update.url(options),
    method: 'post',
})

updateForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: update.url(options),
    method: 'post',
})

update.form = updateForm

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

confirmation.url = (options?: RouteQueryOptions) => {
    return confirmation.definition.url + queryParams(options)
}

confirmation.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: confirmation.url(options),
    method: 'get',
})

confirmation.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: confirmation.url(options),
    method: 'head',
})

const confirmationForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: confirmation.url(options),
    method: 'get',
})

confirmationForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: confirmation.url(options),
    method: 'get',
})

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

request.url = (options?: RouteQueryOptions) => {
    return request.definition.url + queryParams(options)
}

request.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: request.url(options),
    method: 'get',
})

request.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: request.url(options),
    method: 'head',
})

const requestForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: request.url(options),
    method: 'get',
})

requestForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: request.url(options),
    method: 'get',
})

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

reset.url = (args: { token: string | number } | [token: string | number ] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { token: args }
    }

    if (Array.isArray(args)) {
        args = { token: args[0] }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = { token: args.token }

    return reset.definition.url
        .replace('{token}', parsedArgs.token.toString())
        .replace(/\/+$/, '') + queryParams(options)
}

reset.get = (args: { token: string | number } | [token: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: reset.url(args, options),
    method: 'get',
})

reset.head = (args: { token: string | number } | [token: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: reset.url(args, options),
    method: 'head',
})

const resetForm = (args: { token: string | number } | [token: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: reset.url(args, options),
    method: 'get',
})

resetForm.get = (args: { token: string | number } | [token: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: reset.url(args, options),
    method: 'get',
})

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
    forgotEmail: Object.assign(forgotEmail, forgotEmail),
    email: Object.assign(email, email),
    resetUpdate: Object.assign(resetUpdate, resetUpdate),
    update: Object.assign(update, update),
    confirmation: Object.assign(confirmation, confirmation),
    confirm: Object.assign(confirm, confirm),
    request: Object.assign(request, request),
    reset: Object.assign(reset, reset),
}

export default password