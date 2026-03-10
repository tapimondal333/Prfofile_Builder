import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../wayfinder'
import profile937a89 from './profile'
/**
* @see \App\Http\Controllers\UserController::profile
 * @see app/Http/Controllers/UserController.php:19
 * @route '/portfolio/profile'
 */
export const profile = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: profile.url(options),
    method: 'get',
})

profile.definition = {
    methods: ["get","head"],
    url: '/portfolio/profile',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\UserController::profile
 * @see app/Http/Controllers/UserController.php:19
 * @route '/portfolio/profile'
 */
profile.url = (options?: RouteQueryOptions) => {
    return profile.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\UserController::profile
 * @see app/Http/Controllers/UserController.php:19
 * @route '/portfolio/profile'
 */
profile.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: profile.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\UserController::profile
 * @see app/Http/Controllers/UserController.php:19
 * @route '/portfolio/profile'
 */
profile.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: profile.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\UserController::profile
 * @see app/Http/Controllers/UserController.php:19
 * @route '/portfolio/profile'
 */
    const profileForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: profile.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\UserController::profile
 * @see app/Http/Controllers/UserController.php:19
 * @route '/portfolio/profile'
 */
        profileForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: profile.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\UserController::profile
 * @see app/Http/Controllers/UserController.php:19
 * @route '/portfolio/profile'
 */
        profileForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: profile.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    profile.form = profileForm
/**
* @see \App\Http\Controllers\TechController::experience
 * @see app/Http/Controllers/TechController.php:92
 * @route '/portfolio/experience'
 */
export const experience = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: experience.url(options),
    method: 'get',
})

experience.definition = {
    methods: ["get","head"],
    url: '/portfolio/experience',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\TechController::experience
 * @see app/Http/Controllers/TechController.php:92
 * @route '/portfolio/experience'
 */
experience.url = (options?: RouteQueryOptions) => {
    return experience.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\TechController::experience
 * @see app/Http/Controllers/TechController.php:92
 * @route '/portfolio/experience'
 */
experience.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: experience.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\TechController::experience
 * @see app/Http/Controllers/TechController.php:92
 * @route '/portfolio/experience'
 */
experience.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: experience.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\TechController::experience
 * @see app/Http/Controllers/TechController.php:92
 * @route '/portfolio/experience'
 */
    const experienceForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: experience.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\TechController::experience
 * @see app/Http/Controllers/TechController.php:92
 * @route '/portfolio/experience'
 */
        experienceForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: experience.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\TechController::experience
 * @see app/Http/Controllers/TechController.php:92
 * @route '/portfolio/experience'
 */
        experienceForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: experience.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    experience.form = experienceForm
/**
* @see \App\Http\Controllers\UserController::preview
 * @see app/Http/Controllers/UserController.php:102
 * @route '/portfolio/preview'
 */
export const preview = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: preview.url(options),
    method: 'get',
})

preview.definition = {
    methods: ["get","head"],
    url: '/portfolio/preview',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\UserController::preview
 * @see app/Http/Controllers/UserController.php:102
 * @route '/portfolio/preview'
 */
preview.url = (options?: RouteQueryOptions) => {
    return preview.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\UserController::preview
 * @see app/Http/Controllers/UserController.php:102
 * @route '/portfolio/preview'
 */
preview.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: preview.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\UserController::preview
 * @see app/Http/Controllers/UserController.php:102
 * @route '/portfolio/preview'
 */
preview.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: preview.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\UserController::preview
 * @see app/Http/Controllers/UserController.php:102
 * @route '/portfolio/preview'
 */
    const previewForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: preview.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\UserController::preview
 * @see app/Http/Controllers/UserController.php:102
 * @route '/portfolio/preview'
 */
        previewForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: preview.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\UserController::preview
 * @see app/Http/Controllers/UserController.php:102
 * @route '/portfolio/preview'
 */
        previewForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: preview.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    preview.form = previewForm
const portfolio = {
    profile: Object.assign(profile, profile937a89),
experience: Object.assign(experience, experience),
preview: Object.assign(preview, preview),
}

export default portfolio