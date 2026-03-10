import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../wayfinder'
/**
* @see \App\Http\Controllers\EducationController::index
 * @see app/Http/Controllers/EducationController.php:12
 * @route '/portfolio/education'
 */
export const index = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

index.definition = {
    methods: ["get","head"],
    url: '/portfolio/education',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\EducationController::index
 * @see app/Http/Controllers/EducationController.php:12
 * @route '/portfolio/education'
 */
index.url = (options?: RouteQueryOptions) => {
    return index.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\EducationController::index
 * @see app/Http/Controllers/EducationController.php:12
 * @route '/portfolio/education'
 */
index.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\EducationController::index
 * @see app/Http/Controllers/EducationController.php:12
 * @route '/portfolio/education'
 */
index.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: index.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\EducationController::index
 * @see app/Http/Controllers/EducationController.php:12
 * @route '/portfolio/education'
 */
    const indexForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: index.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\EducationController::index
 * @see app/Http/Controllers/EducationController.php:12
 * @route '/portfolio/education'
 */
        indexForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: index.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\EducationController::index
 * @see app/Http/Controllers/EducationController.php:12
 * @route '/portfolio/education'
 */
        indexForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: index.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    index.form = indexForm
/**
* @see \App\Http\Controllers\EducationController::store
 * @see app/Http/Controllers/EducationController.php:21
 * @route '/portfolio/education'
 */
export const store = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: store.url(options),
    method: 'post',
})

store.definition = {
    methods: ["post"],
    url: '/portfolio/education',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\EducationController::store
 * @see app/Http/Controllers/EducationController.php:21
 * @route '/portfolio/education'
 */
store.url = (options?: RouteQueryOptions) => {
    return store.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\EducationController::store
 * @see app/Http/Controllers/EducationController.php:21
 * @route '/portfolio/education'
 */
store.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: store.url(options),
    method: 'post',
})

    /**
* @see \App\Http\Controllers\EducationController::store
 * @see app/Http/Controllers/EducationController.php:21
 * @route '/portfolio/education'
 */
    const storeForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: store.url(options),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\EducationController::store
 * @see app/Http/Controllers/EducationController.php:21
 * @route '/portfolio/education'
 */
        storeForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: store.url(options),
            method: 'post',
        })
    
    store.form = storeForm
/**
* @see \App\Http\Controllers\EducationController::update
 * @see app/Http/Controllers/EducationController.php:49
 * @route '/portfolio/education/{education}'
 */
export const update = (args: { education: number | { id: number } } | [education: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: update.url(args, options),
    method: 'put',
})

update.definition = {
    methods: ["put"],
    url: '/portfolio/education/{education}',
} satisfies RouteDefinition<["put"]>

/**
* @see \App\Http\Controllers\EducationController::update
 * @see app/Http/Controllers/EducationController.php:49
 * @route '/portfolio/education/{education}'
 */
update.url = (args: { education: number | { id: number } } | [education: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { education: args }
    }

            if (typeof args === 'object' && !Array.isArray(args) && 'id' in args) {
            args = { education: args.id }
        }
    
    if (Array.isArray(args)) {
        args = {
                    education: args[0],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        education: typeof args.education === 'object'
                ? args.education.id
                : args.education,
                }

    return update.definition.url
            .replace('{education}', parsedArgs.education.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\EducationController::update
 * @see app/Http/Controllers/EducationController.php:49
 * @route '/portfolio/education/{education}'
 */
update.put = (args: { education: number | { id: number } } | [education: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: update.url(args, options),
    method: 'put',
})

    /**
* @see \App\Http\Controllers\EducationController::update
 * @see app/Http/Controllers/EducationController.php:49
 * @route '/portfolio/education/{education}'
 */
    const updateForm = (args: { education: number | { id: number } } | [education: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: update.url(args, {
                    [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                        _method: 'PUT',
                        ...(options?.query ?? options?.mergeQuery ?? {}),
                    }
                }),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\EducationController::update
 * @see app/Http/Controllers/EducationController.php:49
 * @route '/portfolio/education/{education}'
 */
        updateForm.put = (args: { education: number | { id: number } } | [education: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
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
* @see \App\Http\Controllers\EducationController::destroy
 * @see app/Http/Controllers/EducationController.php:76
 * @route '/portfolio/education/{education}'
 */
export const destroy = (args: { education: number | { id: number } } | [education: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(args, options),
    method: 'delete',
})

destroy.definition = {
    methods: ["delete"],
    url: '/portfolio/education/{education}',
} satisfies RouteDefinition<["delete"]>

/**
* @see \App\Http\Controllers\EducationController::destroy
 * @see app/Http/Controllers/EducationController.php:76
 * @route '/portfolio/education/{education}'
 */
destroy.url = (args: { education: number | { id: number } } | [education: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { education: args }
    }

            if (typeof args === 'object' && !Array.isArray(args) && 'id' in args) {
            args = { education: args.id }
        }
    
    if (Array.isArray(args)) {
        args = {
                    education: args[0],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        education: typeof args.education === 'object'
                ? args.education.id
                : args.education,
                }

    return destroy.definition.url
            .replace('{education}', parsedArgs.education.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\EducationController::destroy
 * @see app/Http/Controllers/EducationController.php:76
 * @route '/portfolio/education/{education}'
 */
destroy.delete = (args: { education: number | { id: number } } | [education: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(args, options),
    method: 'delete',
})

    /**
* @see \App\Http\Controllers\EducationController::destroy
 * @see app/Http/Controllers/EducationController.php:76
 * @route '/portfolio/education/{education}'
 */
    const destroyForm = (args: { education: number | { id: number } } | [education: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: destroy.url(args, {
                    [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                        _method: 'DELETE',
                        ...(options?.query ?? options?.mergeQuery ?? {}),
                    }
                }),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\EducationController::destroy
 * @see app/Http/Controllers/EducationController.php:76
 * @route '/portfolio/education/{education}'
 */
        destroyForm.delete = (args: { education: number | { id: number } } | [education: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
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
* @see \App\Http\Controllers\EducationController::show
 * @see app/Http/Controllers/EducationController.php:89
 * @route '/portfolio/education/{education}'
 */
export const show = (args: { education: number | { id: number } } | [education: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: show.url(args, options),
    method: 'get',
})

show.definition = {
    methods: ["get","head"],
    url: '/portfolio/education/{education}',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\EducationController::show
 * @see app/Http/Controllers/EducationController.php:89
 * @route '/portfolio/education/{education}'
 */
show.url = (args: { education: number | { id: number } } | [education: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { education: args }
    }

            if (typeof args === 'object' && !Array.isArray(args) && 'id' in args) {
            args = { education: args.id }
        }
    
    if (Array.isArray(args)) {
        args = {
                    education: args[0],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        education: typeof args.education === 'object'
                ? args.education.id
                : args.education,
                }

    return show.definition.url
            .replace('{education}', parsedArgs.education.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\EducationController::show
 * @see app/Http/Controllers/EducationController.php:89
 * @route '/portfolio/education/{education}'
 */
show.get = (args: { education: number | { id: number } } | [education: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: show.url(args, options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\EducationController::show
 * @see app/Http/Controllers/EducationController.php:89
 * @route '/portfolio/education/{education}'
 */
show.head = (args: { education: number | { id: number } } | [education: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: show.url(args, options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\EducationController::show
 * @see app/Http/Controllers/EducationController.php:89
 * @route '/portfolio/education/{education}'
 */
    const showForm = (args: { education: number | { id: number } } | [education: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: show.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\EducationController::show
 * @see app/Http/Controllers/EducationController.php:89
 * @route '/portfolio/education/{education}'
 */
        showForm.get = (args: { education: number | { id: number } } | [education: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: show.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\EducationController::show
 * @see app/Http/Controllers/EducationController.php:89
 * @route '/portfolio/education/{education}'
 */
        showForm.head = (args: { education: number | { id: number } } | [education: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: show.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    show.form = showForm
const education = {
    index: Object.assign(index, index),
store: Object.assign(store, store),
update: Object.assign(update, update),
destroy: Object.assign(destroy, destroy),
show: Object.assign(show, show),
}

export default education