import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../../wayfinder'
/**
* @see \App\Http\Controllers\AdminUserController::show
 * @see app/Http/Controllers/AdminUserController.php:86
 * @route '/admin/profile'
 */
export const show = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: show.url(options),
    method: 'get',
})

show.definition = {
    methods: ["get","head"],
    url: '/admin/profile',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\AdminUserController::show
 * @see app/Http/Controllers/AdminUserController.php:86
 * @route '/admin/profile'
 */
show.url = (options?: RouteQueryOptions) => {
    return show.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\AdminUserController::show
 * @see app/Http/Controllers/AdminUserController.php:86
 * @route '/admin/profile'
 */
show.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: show.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\AdminUserController::show
 * @see app/Http/Controllers/AdminUserController.php:86
 * @route '/admin/profile'
 */
show.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: show.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\AdminUserController::show
 * @see app/Http/Controllers/AdminUserController.php:86
 * @route '/admin/profile'
 */
    const showForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: show.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\AdminUserController::show
 * @see app/Http/Controllers/AdminUserController.php:86
 * @route '/admin/profile'
 */
        showForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: show.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\AdminUserController::show
 * @see app/Http/Controllers/AdminUserController.php:86
 * @route '/admin/profile'
 */
        showForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: show.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    show.form = showForm
/**
* @see \App\Http\Controllers\AdminUserController::edit
 * @see app/Http/Controllers/AdminUserController.php:100
 * @route '/admin/profile/edit'
 */
export const edit = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: edit.url(options),
    method: 'get',
})

edit.definition = {
    methods: ["get","head"],
    url: '/admin/profile/edit',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\AdminUserController::edit
 * @see app/Http/Controllers/AdminUserController.php:100
 * @route '/admin/profile/edit'
 */
edit.url = (options?: RouteQueryOptions) => {
    return edit.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\AdminUserController::edit
 * @see app/Http/Controllers/AdminUserController.php:100
 * @route '/admin/profile/edit'
 */
edit.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: edit.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\AdminUserController::edit
 * @see app/Http/Controllers/AdminUserController.php:100
 * @route '/admin/profile/edit'
 */
edit.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: edit.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\AdminUserController::edit
 * @see app/Http/Controllers/AdminUserController.php:100
 * @route '/admin/profile/edit'
 */
    const editForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: edit.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\AdminUserController::edit
 * @see app/Http/Controllers/AdminUserController.php:100
 * @route '/admin/profile/edit'
 */
        editForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: edit.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\AdminUserController::edit
 * @see app/Http/Controllers/AdminUserController.php:100
 * @route '/admin/profile/edit'
 */
        editForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: edit.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    edit.form = editForm
/**
* @see \App\Http\Controllers\AdminUserController::update
 * @see app/Http/Controllers/AdminUserController.php:114
 * @route '/admin/profile/update'
 */
export const update = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: update.url(options),
    method: 'post',
})

update.definition = {
    methods: ["post"],
    url: '/admin/profile/update',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\AdminUserController::update
 * @see app/Http/Controllers/AdminUserController.php:114
 * @route '/admin/profile/update'
 */
update.url = (options?: RouteQueryOptions) => {
    return update.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\AdminUserController::update
 * @see app/Http/Controllers/AdminUserController.php:114
 * @route '/admin/profile/update'
 */
update.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: update.url(options),
    method: 'post',
})

    /**
* @see \App\Http\Controllers\AdminUserController::update
 * @see app/Http/Controllers/AdminUserController.php:114
 * @route '/admin/profile/update'
 */
    const updateForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: update.url(options),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\AdminUserController::update
 * @see app/Http/Controllers/AdminUserController.php:114
 * @route '/admin/profile/update'
 */
        updateForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: update.url(options),
            method: 'post',
        })
    
    update.form = updateForm
/**
* @see \App\Http\Controllers\AdminUserController::view
 * @see app/Http/Controllers/AdminUserController.php:156
 * @route '/admin/profile/{user}'
 */
export const view = (args: { user: number | { id: number } } | [user: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: view.url(args, options),
    method: 'get',
})

view.definition = {
    methods: ["get","head"],
    url: '/admin/profile/{user}',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\AdminUserController::view
 * @see app/Http/Controllers/AdminUserController.php:156
 * @route '/admin/profile/{user}'
 */
view.url = (args: { user: number | { id: number } } | [user: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { user: args }
    }

            if (typeof args === 'object' && !Array.isArray(args) && 'id' in args) {
            args = { user: args.id }
        }
    
    if (Array.isArray(args)) {
        args = {
                    user: args[0],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        user: typeof args.user === 'object'
                ? args.user.id
                : args.user,
                }

    return view.definition.url
            .replace('{user}', parsedArgs.user.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\AdminUserController::view
 * @see app/Http/Controllers/AdminUserController.php:156
 * @route '/admin/profile/{user}'
 */
view.get = (args: { user: number | { id: number } } | [user: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: view.url(args, options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\AdminUserController::view
 * @see app/Http/Controllers/AdminUserController.php:156
 * @route '/admin/profile/{user}'
 */
view.head = (args: { user: number | { id: number } } | [user: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: view.url(args, options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\AdminUserController::view
 * @see app/Http/Controllers/AdminUserController.php:156
 * @route '/admin/profile/{user}'
 */
    const viewForm = (args: { user: number | { id: number } } | [user: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: view.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\AdminUserController::view
 * @see app/Http/Controllers/AdminUserController.php:156
 * @route '/admin/profile/{user}'
 */
        viewForm.get = (args: { user: number | { id: number } } | [user: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: view.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\AdminUserController::view
 * @see app/Http/Controllers/AdminUserController.php:156
 * @route '/admin/profile/{user}'
 */
        viewForm.head = (args: { user: number | { id: number } } | [user: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: view.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    view.form = viewForm
/**
* @see \App\Http\Controllers\AdminUserController::editAdmin
 * @see app/Http/Controllers/AdminUserController.php:173
 * @route '/admin/profile/{user}/edit'
 */
export const editAdmin = (args: { user: number | { id: number } } | [user: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: editAdmin.url(args, options),
    method: 'get',
})

editAdmin.definition = {
    methods: ["get","head"],
    url: '/admin/profile/{user}/edit',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\AdminUserController::editAdmin
 * @see app/Http/Controllers/AdminUserController.php:173
 * @route '/admin/profile/{user}/edit'
 */
editAdmin.url = (args: { user: number | { id: number } } | [user: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { user: args }
    }

            if (typeof args === 'object' && !Array.isArray(args) && 'id' in args) {
            args = { user: args.id }
        }
    
    if (Array.isArray(args)) {
        args = {
                    user: args[0],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        user: typeof args.user === 'object'
                ? args.user.id
                : args.user,
                }

    return editAdmin.definition.url
            .replace('{user}', parsedArgs.user.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\AdminUserController::editAdmin
 * @see app/Http/Controllers/AdminUserController.php:173
 * @route '/admin/profile/{user}/edit'
 */
editAdmin.get = (args: { user: number | { id: number } } | [user: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: editAdmin.url(args, options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\AdminUserController::editAdmin
 * @see app/Http/Controllers/AdminUserController.php:173
 * @route '/admin/profile/{user}/edit'
 */
editAdmin.head = (args: { user: number | { id: number } } | [user: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: editAdmin.url(args, options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\AdminUserController::editAdmin
 * @see app/Http/Controllers/AdminUserController.php:173
 * @route '/admin/profile/{user}/edit'
 */
    const editAdminForm = (args: { user: number | { id: number } } | [user: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: editAdmin.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\AdminUserController::editAdmin
 * @see app/Http/Controllers/AdminUserController.php:173
 * @route '/admin/profile/{user}/edit'
 */
        editAdminForm.get = (args: { user: number | { id: number } } | [user: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: editAdmin.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\AdminUserController::editAdmin
 * @see app/Http/Controllers/AdminUserController.php:173
 * @route '/admin/profile/{user}/edit'
 */
        editAdminForm.head = (args: { user: number | { id: number } } | [user: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: editAdmin.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    editAdmin.form = editAdminForm
/**
* @see \App\Http\Controllers\AdminUserController::updateAdmin
 * @see app/Http/Controllers/AdminUserController.php:194
 * @route '/admin/profile/{user}/update'
 */
export const updateAdmin = (args: { user: number | { id: number } } | [user: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: updateAdmin.url(args, options),
    method: 'post',
})

updateAdmin.definition = {
    methods: ["post"],
    url: '/admin/profile/{user}/update',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\AdminUserController::updateAdmin
 * @see app/Http/Controllers/AdminUserController.php:194
 * @route '/admin/profile/{user}/update'
 */
updateAdmin.url = (args: { user: number | { id: number } } | [user: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { user: args }
    }

            if (typeof args === 'object' && !Array.isArray(args) && 'id' in args) {
            args = { user: args.id }
        }
    
    if (Array.isArray(args)) {
        args = {
                    user: args[0],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        user: typeof args.user === 'object'
                ? args.user.id
                : args.user,
                }

    return updateAdmin.definition.url
            .replace('{user}', parsedArgs.user.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\AdminUserController::updateAdmin
 * @see app/Http/Controllers/AdminUserController.php:194
 * @route '/admin/profile/{user}/update'
 */
updateAdmin.post = (args: { user: number | { id: number } } | [user: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: updateAdmin.url(args, options),
    method: 'post',
})

    /**
* @see \App\Http\Controllers\AdminUserController::updateAdmin
 * @see app/Http/Controllers/AdminUserController.php:194
 * @route '/admin/profile/{user}/update'
 */
    const updateAdminForm = (args: { user: number | { id: number } } | [user: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: updateAdmin.url(args, options),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\AdminUserController::updateAdmin
 * @see app/Http/Controllers/AdminUserController.php:194
 * @route '/admin/profile/{user}/update'
 */
        updateAdminForm.post = (args: { user: number | { id: number } } | [user: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: updateAdmin.url(args, options),
            method: 'post',
        })
    
    updateAdmin.form = updateAdminForm
/**
* @see \App\Http\Controllers\AdminUserController::deleteMethod
 * @see app/Http/Controllers/AdminUserController.php:259
 * @route '/admin/profile/{user}'
 */
export const deleteMethod = (args: { user: number | { id: number } } | [user: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: deleteMethod.url(args, options),
    method: 'delete',
})

deleteMethod.definition = {
    methods: ["delete"],
    url: '/admin/profile/{user}',
} satisfies RouteDefinition<["delete"]>

/**
* @see \App\Http\Controllers\AdminUserController::deleteMethod
 * @see app/Http/Controllers/AdminUserController.php:259
 * @route '/admin/profile/{user}'
 */
deleteMethod.url = (args: { user: number | { id: number } } | [user: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { user: args }
    }

            if (typeof args === 'object' && !Array.isArray(args) && 'id' in args) {
            args = { user: args.id }
        }
    
    if (Array.isArray(args)) {
        args = {
                    user: args[0],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        user: typeof args.user === 'object'
                ? args.user.id
                : args.user,
                }

    return deleteMethod.definition.url
            .replace('{user}', parsedArgs.user.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\AdminUserController::deleteMethod
 * @see app/Http/Controllers/AdminUserController.php:259
 * @route '/admin/profile/{user}'
 */
deleteMethod.delete = (args: { user: number | { id: number } } | [user: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: deleteMethod.url(args, options),
    method: 'delete',
})

    /**
* @see \App\Http\Controllers\AdminUserController::deleteMethod
 * @see app/Http/Controllers/AdminUserController.php:259
 * @route '/admin/profile/{user}'
 */
    const deleteMethodForm = (args: { user: number | { id: number } } | [user: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: deleteMethod.url(args, {
                    [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                        _method: 'DELETE',
                        ...(options?.query ?? options?.mergeQuery ?? {}),
                    }
                }),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\AdminUserController::deleteMethod
 * @see app/Http/Controllers/AdminUserController.php:259
 * @route '/admin/profile/{user}'
 */
        deleteMethodForm.delete = (args: { user: number | { id: number } } | [user: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: deleteMethod.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'DELETE',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'post',
        })
    
    deleteMethod.form = deleteMethodForm
const profile = {
    show: Object.assign(show, show),
edit: Object.assign(edit, edit),
update: Object.assign(update, update),
view: Object.assign(view, view),
editAdmin: Object.assign(editAdmin, editAdmin),
updateAdmin: Object.assign(updateAdmin, updateAdmin),
delete: Object.assign(deleteMethod, deleteMethod),
}

export default profile