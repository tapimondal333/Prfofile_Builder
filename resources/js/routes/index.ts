import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../wayfinder'
/**
* @see \App\Http\Controllers\AuthController::user_logout
 * @see app/Http/Controllers/AuthController.php:136
 * @route '/logout'
 */
export const user_logout = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: user_logout.url(options),
    method: 'post',
})

user_logout.definition = {
    methods: ["post"],
    url: '/logout',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\AuthController::user_logout
 * @see app/Http/Controllers/AuthController.php:136
 * @route '/logout'
 */
user_logout.url = (options?: RouteQueryOptions) => {
    return user_logout.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\AuthController::user_logout
 * @see app/Http/Controllers/AuthController.php:136
 * @route '/logout'
 */
user_logout.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: user_logout.url(options),
    method: 'post',
})

    /**
* @see \App\Http\Controllers\AuthController::user_logout
 * @see app/Http/Controllers/AuthController.php:136
 * @route '/logout'
 */
    const user_logoutForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: user_logout.url(options),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\AuthController::user_logout
 * @see app/Http/Controllers/AuthController.php:136
 * @route '/logout'
 */
        user_logoutForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: user_logout.url(options),
            method: 'post',
        })
    
    user_logout.form = user_logoutForm
/**
* @see \App\Http\Controllers\AuthController::welcome
 * @see app/Http/Controllers/AuthController.php:21
 * @route '/'
 */
export const welcome = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: welcome.url(options),
    method: 'get',
})

welcome.definition = {
    methods: ["get","head"],
    url: '/',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\AuthController::welcome
 * @see app/Http/Controllers/AuthController.php:21
 * @route '/'
 */
welcome.url = (options?: RouteQueryOptions) => {
    return welcome.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\AuthController::welcome
 * @see app/Http/Controllers/AuthController.php:21
 * @route '/'
 */
welcome.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: welcome.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\AuthController::welcome
 * @see app/Http/Controllers/AuthController.php:21
 * @route '/'
 */
welcome.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: welcome.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\AuthController::welcome
 * @see app/Http/Controllers/AuthController.php:21
 * @route '/'
 */
    const welcomeForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: welcome.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\AuthController::welcome
 * @see app/Http/Controllers/AuthController.php:21
 * @route '/'
 */
        welcomeForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: welcome.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\AuthController::welcome
 * @see app/Http/Controllers/AuthController.php:21
 * @route '/'
 */
        welcomeForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: welcome.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    welcome.form = welcomeForm
/**
* @see \App\Http\Controllers\AuthController::login
 * @see app/Http/Controllers/AuthController.php:21
 * @route '/login'
 */
export const login = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: login.url(options),
    method: 'get',
})

login.definition = {
    methods: ["get","head"],
    url: '/login',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\AuthController::login
 * @see app/Http/Controllers/AuthController.php:21
 * @route '/login'
 */
login.url = (options?: RouteQueryOptions) => {
    return login.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\AuthController::login
 * @see app/Http/Controllers/AuthController.php:21
 * @route '/login'
 */
login.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: login.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\AuthController::login
 * @see app/Http/Controllers/AuthController.php:21
 * @route '/login'
 */
login.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: login.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\AuthController::login
 * @see app/Http/Controllers/AuthController.php:21
 * @route '/login'
 */
    const loginForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: login.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\AuthController::login
 * @see app/Http/Controllers/AuthController.php:21
 * @route '/login'
 */
        loginForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: login.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\AuthController::login
 * @see app/Http/Controllers/AuthController.php:21
 * @route '/login'
 */
        loginForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: login.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    login.form = loginForm
/**
* @see \App\Http\Controllers\AuthController::register
 * @see app/Http/Controllers/AuthController.php:27
 * @route '/register'
 */
export const register = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: register.url(options),
    method: 'get',
})

register.definition = {
    methods: ["get","head"],
    url: '/register',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\AuthController::register
 * @see app/Http/Controllers/AuthController.php:27
 * @route '/register'
 */
register.url = (options?: RouteQueryOptions) => {
    return register.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\AuthController::register
 * @see app/Http/Controllers/AuthController.php:27
 * @route '/register'
 */
register.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: register.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\AuthController::register
 * @see app/Http/Controllers/AuthController.php:27
 * @route '/register'
 */
register.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: register.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\AuthController::register
 * @see app/Http/Controllers/AuthController.php:27
 * @route '/register'
 */
    const registerForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: register.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\AuthController::register
 * @see app/Http/Controllers/AuthController.php:27
 * @route '/register'
 */
        registerForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: register.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\AuthController::register
 * @see app/Http/Controllers/AuthController.php:27
 * @route '/register'
 */
        registerForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: register.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    register.form = registerForm
/**
* @see \App\Http\Controllers\DashboardController::dashboard
 * @see app/Http/Controllers/DashboardController.php:21
 * @route '/dashboard'
 */
export const dashboard = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: dashboard.url(options),
    method: 'get',
})

dashboard.definition = {
    methods: ["get","head"],
    url: '/dashboard',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\DashboardController::dashboard
 * @see app/Http/Controllers/DashboardController.php:21
 * @route '/dashboard'
 */
dashboard.url = (options?: RouteQueryOptions) => {
    return dashboard.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\DashboardController::dashboard
 * @see app/Http/Controllers/DashboardController.php:21
 * @route '/dashboard'
 */
dashboard.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: dashboard.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\DashboardController::dashboard
 * @see app/Http/Controllers/DashboardController.php:21
 * @route '/dashboard'
 */
dashboard.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: dashboard.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\DashboardController::dashboard
 * @see app/Http/Controllers/DashboardController.php:21
 * @route '/dashboard'
 */
    const dashboardForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: dashboard.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\DashboardController::dashboard
 * @see app/Http/Controllers/DashboardController.php:21
 * @route '/dashboard'
 */
        dashboardForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: dashboard.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\DashboardController::dashboard
 * @see app/Http/Controllers/DashboardController.php:21
 * @route '/dashboard'
 */
        dashboardForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: dashboard.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    dashboard.form = dashboardForm
/**
* @see \App\Http\Controllers\AuthController::admin_logout
 * @see app/Http/Controllers/AuthController.php:146
 * @route '/admin/logout'
 */
export const admin_logout = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: admin_logout.url(options),
    method: 'post',
})

admin_logout.definition = {
    methods: ["post"],
    url: '/admin/logout',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\AuthController::admin_logout
 * @see app/Http/Controllers/AuthController.php:146
 * @route '/admin/logout'
 */
admin_logout.url = (options?: RouteQueryOptions) => {
    return admin_logout.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\AuthController::admin_logout
 * @see app/Http/Controllers/AuthController.php:146
 * @route '/admin/logout'
 */
admin_logout.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: admin_logout.url(options),
    method: 'post',
})

    /**
* @see \App\Http\Controllers\AuthController::admin_logout
 * @see app/Http/Controllers/AuthController.php:146
 * @route '/admin/logout'
 */
    const admin_logoutForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: admin_logout.url(options),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\AuthController::admin_logout
 * @see app/Http/Controllers/AuthController.php:146
 * @route '/admin/logout'
 */
        admin_logoutForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: admin_logout.url(options),
            method: 'post',
        })
    
    admin_logout.form = admin_logoutForm