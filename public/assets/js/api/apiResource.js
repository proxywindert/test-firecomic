


async function apiGet (context, url, options = {}) {
    try {
        const opt = getCommonOptions(context)
        const response = await axios.get(`${url}`, Object.assign(opt, options))
        return response
    } catch (e) {
        handleError(context, e)
        throw e
    }
}

async function apiDelete (context, url, options = {}) {
    try {
        const opt = getCommonOptions(context)
        const response = await axios.delete(`${url}`, Object.assign(opt, options))
        return response
    } catch (e) {
        handleError(context, e)
        throw e
    }
}

async function apiPost (context, url, params, options = {}) {
    try {
        const opt = getCommonOptions(context)
        const response = await axios.post(`${url}`, params, Object.assign(opt, options))
        return response
    } catch (e) {
        handleError(context, e)
        throw e
    }
}

 async function apiPut (context, url, params, options = {}) {
    try {
        const opt = await getCommonOptions(context)
        const response = await axios.put(`${url}`, params, Object.assign(opt, options))
        return response
    } catch (e) {
        handleError(context, e)
        throw e
    }
}

 async function apiPatch (context, url, params, options = {}) {
    try {
        const opt = await getCommonOptions(context)
        const response = await axios.patch(`${url}`, params, Object.assign(opt, options))
        return response
    } catch (e) {
        handleError(context, e)
        throw e
    }
}

const getCommonOptions = context => {
    const headers = {}
    const token = localStorage.getItem("access_token");
    if (token) {
        headers['Authorization'] = `Bearer ${token}`
        // headers.client = authInfo.client
        // headers.uid = authInfo.uid
    }
    return { headers }
}

const handleError = (context, e) => {
}
