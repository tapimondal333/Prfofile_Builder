import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../wayfinder'
/**
* @see \App\Http\Controllers\AuthController::request
 * @see app/Http/Controllers/AuthController.php:88
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
 * @see app/Http/Controllers/AuthController.php:88
 * @route '/password/reset'
 */
request.url = (options?: RouteQueryOptions) => {
    return request.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\AuthController::request
 * @see app/Http/Controllers/AuthController.php:88
 * @route '/password/reset'
 */
request.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: request.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\AuthController::request
 * @see app/Http/Controllers/AuthController.php:88
 * @route '/password/reset'
 */
request.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: request.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\AuthController::request
 * @see app/Http/Controllers/AuthController.php:88
 * @route '/password/reset'
 */
    const requestForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: request.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\AuthController::request
 * @see app/Http/Controllers/AuthController.php:88
 * @route '/password/reset'
 */
        requestForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: request.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\AuthController::request
 * @see app/Http/Controllers/AuthController.php:88
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
* @see \App\Http\Controllers\AuthController::email
 * @see app/Http/Controllers/AuthController.php:93
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

/**
* @see \App\Http\Controllers\AuthController::email
 * @see app/Http/Controllers/AuthController.php:93
 * @route '/password/email'
 */
email.url = (options?: RouteQueryOptions) => {
    return email.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\AuthController::email
 * @see app/Http/Controllers/AuthController.php:93
 * @route '/password/email'
 */
email.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: email.url(options),
    method: 'post',
})

    /**
* @see \App\Http\Controllers\AuthController::email
 * @see app/Http/Controllers/AuthController.php:93
 * @route '/password/email'
 */
    const emailForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: email.url(options),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\AuthController::email
 * @see app/Http/Controllers/AuthController.php:93
 * @route '/password/email'
 */
        emailForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: email.url(options),
            method: 'post',
        })
    
    email.form = emailForm
/**
* @see \App\Http\Controllers\AuthController::update
 * @see app/Http/Controllers/AuthController.php:111
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

/**
* @see \App\Http\Controllers\AuthController::update
 * @see app/Http/Controllers/AuthController.php:111
 * @route '/password/reset'
 */
update.url = (options?: RouteQueryOptions) => {
    return update.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\AuthController::update
 * @see app/Http/Controllers/AuthController.php:111
 * @route '/password/reset'
 */
update.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: update.url(options),
    method: 'post',
})

    /**
* @see \App\Http\Controllers\AuthController::update
 * @see app/Http/Controllers/AuthController.php:111
 * @route '/password/reset'
 */
    const updateForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: update.url(options),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\AuthController::update
 * @see app/Http/Controllers/AuthController.php:111
 * @route '/password/reset'
 */
        updateForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: update.url(options),
            method: 'post',
        })
    
    update.form = updateForm
const password = {
    request: Object.assign(request, request),
email: Object.assign(email, email),
update: Object.assign(update, update),
}

export default password