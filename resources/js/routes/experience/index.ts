import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../wayfinder'
/**
* @see \App\Http\Controllers\TechController::store
 * @see app/Http/Controllers/TechController.php:98
 * @route '/experiences'
 */
export const store = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: store.url(options),
    method: 'post',
})

store.definition = {
    methods: ["post"],
    url: '/experiences',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\TechController::store
 * @see app/Http/Controllers/TechController.php:98
 * @route '/experiences'
 */
store.url = (options?: RouteQueryOptions) => {
    return store.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\TechController::store
 * @see app/Http/Controllers/TechController.php:98
 * @route '/experiences'
 */
store.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: store.url(options),
    method: 'post',
})

    /**
* @see \App\Http\Controllers\TechController::store
 * @see app/Http/Controllers/TechController.php:98
 * @route '/experiences'
 */
    const storeForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: store.url(options),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\TechController::store
 * @see app/Http/Controllers/TechController.php:98
 * @route '/experiences'
 */
        storeForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: store.url(options),
            method: 'post',
        })
    
    store.form = storeForm
/**
* @see \App\Http\Controllers\TechController::update
 * @see app/Http/Controllers/TechController.php:124
 * @route '/experiences/{experience}'
 */
export const update = (args: { experience: number | { id: number } } | [experience: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: update.url(args, options),
    method: 'put',
})

update.definition = {
    methods: ["put"],
    url: '/experiences/{experience}',
} satisfies RouteDefinition<["put"]>

/**
* @see \App\Http\Controllers\TechController::update
 * @see app/Http/Controllers/TechController.php:124
 * @route '/experiences/{experience}'
 */
update.url = (args: { experience: number | { id: number } } | [experience: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { experience: args }
    }

            if (typeof args === 'object' && !Array.isArray(args) && 'id' in args) {
            args = { experience: args.id }
        }
    
    if (Array.isArray(args)) {
        args = {
                    experience: args[0],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        experience: typeof args.experience === 'object'
                ? args.experience.id
                : args.experience,
                }

    return update.definition.url
            .replace('{experience}', parsedArgs.experience.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\TechController::update
 * @see app/Http/Controllers/TechController.php:124
 * @route '/experiences/{experience}'
 */
update.put = (args: { experience: number | { id: number } } | [experience: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: update.url(args, options),
    method: 'put',
})

    /**
* @see \App\Http\Controllers\TechController::update
 * @see app/Http/Controllers/TechController.php:124
 * @route '/experiences/{experience}'
 */
    const updateForm = (args: { experience: number | { id: number } } | [experience: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: update.url(args, {
                    [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                        _method: 'PUT',
                        ...(options?.query ?? options?.mergeQuery ?? {}),
                    }
                }),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\TechController::update
 * @see app/Http/Controllers/TechController.php:124
 * @route '/experiences/{experience}'
 */
        updateForm.put = (args: { experience: number | { id: number } } | [experience: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: update.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'PUT',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'post',
        })
    
    update.form = updateForm
/**
* @see \App\Http\Controllers\TechController::destroy
 * @see app/Http/Controllers/TechController.php:150
 * @route '/experiences/{experience}'
 */
export const destroy = (args: { experience: number | { id: number } } | [experience: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(args, options),
    method: 'delete',
})

destroy.definition = {
    methods: ["delete"],
    url: '/experiences/{experience}',
} satisfies RouteDefinition<["delete"]>

/**
* @see \App\Http\Controllers\TechController::destroy
 * @see app/Http/Controllers/TechController.php:150
 * @route '/experiences/{experience}'
 */
destroy.url = (args: { experience: number | { id: number } } | [experience: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { experience: args }
    }

            if (typeof args === 'object' && !Array.isArray(args) && 'id' in args) {
            args = { experience: args.id }
        }
    
    if (Array.isArray(args)) {
        args = {
                    experience: args[0],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        experience: typeof args.experience === 'object'
                ? args.experience.id
                : args.experience,
                }

    return destroy.definition.url
            .replace('{experience}', parsedArgs.experience.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\TechController::destroy
 * @see app/Http/Controllers/TechController.php:150
 * @route '/experiences/{experience}'
 */
destroy.delete = (args: { experience: number | { id: number } } | [experience: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(args, options),
    method: 'delete',
})

    /**
* @see \App\Http\Controllers\TechController::destroy
 * @see app/Http/Controllers/TechController.php:150
 * @route '/experiences/{experience}'
 */
    const destroyForm = (args: { experience: number | { id: number } } | [experience: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: destroy.url(args, {
                    [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                        _method: 'DELETE',
                        ...(options?.query ?? options?.mergeQuery ?? {}),
                    }
                }),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\TechController::destroy
 * @see app/Http/Controllers/TechController.php:150
 * @route '/experiences/{experience}'
 */
        destroyForm.delete = (args: { experience: number | { id: number } } | [experience: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: destroy.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'DELETE',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'post',
        })
    
    destroy.form = destroyForm
/**
* @see \App\Http\Controllers\TechController::show
 * @see app/Http/Controllers/TechController.php:159
 * @route '/experiences/{experience}'
 */
export const show = (args: { experience: number | { id: number } } | [experience: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: show.url(args, options),
    method: 'get',
})

show.definition = {
    methods: ["get","head"],
    url: '/experiences/{experience}',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\TechController::show
 * @see app/Http/Controllers/TechController.php:159
 * @route '/experiences/{experience}'
 */
show.url = (args: { experience: number | { id: number } } | [experience: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { experience: args }
    }

            if (typeof args === 'object' && !Array.isArray(args) && 'id' in args) {
            args = { experience: args.id }
        }
    
    if (Array.isArray(args)) {
        args = {
                    experience: args[0],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        experience: typeof args.experience === 'object'
                ? args.experience.id
                : args.experience,
                }

    return show.definition.url
            .replace('{experience}', parsedArgs.experience.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\TechController::show
 * @see app/Http/Controllers/TechController.php:159
 * @route '/experiences/{experience}'
 */
show.get = (args: { experience: number | { id: number } } | [experience: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: show.url(args, options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\TechController::show
 * @see app/Http/Controllers/TechController.php:159
 * @route '/experiences/{experience}'
 */
show.head = (args: { experience: number | { id: number } } | [experience: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: show.url(args, options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\TechController::show
 * @see app/Http/Controllers/TechController.php:159
 * @route '/experiences/{experience}'
 */
    const showForm = (args: { experience: number | { id: number } } | [experience: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: show.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\TechController::show
 * @see app/Http/Controllers/TechController.php:159
 * @route '/experiences/{experience}'
 */
        showForm.get = (args: { experience: number | { id: number } } | [experience: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: show.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\TechController::show
 * @see app/Http/Controllers/TechController.php:159
 * @route '/experiences/{experience}'
 */
        showForm.head = (args: { experience: number | { id: number } } | [experience: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: show.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    show.form = showForm
const experience = {
    store: Object.assign(store, store),
update: Object.assign(update, update),
destroy: Object.assign(destroy, destroy),
show: Object.assign(show, show),
}

export default experience