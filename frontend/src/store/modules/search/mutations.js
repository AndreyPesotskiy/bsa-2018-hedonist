export default {
    SET_SEARCH_CITY: (state, searchCity) => {
        if (!_.isEmpty(searchCity)) {
            state.city = {
                name: searchCity.text,
                longitude: searchCity.center[0],
                latitude: searchCity.center[1],
                fullName: searchCity.place_name
            };
        } else {
            state.city = {
                name: '',
                longitude: null,
                latitude: null,
                fullName: ''
            };
        }
    },

    SET_SEARCH_PLACE_CATEGORY: (state, searchPlaceCategory) => {
        if (!_.isEmpty(searchPlaceCategory)) {
            state.placeCategory = {
                id: searchPlaceCategory.id,
                name: searchPlaceCategory.name
            };
        } else {
            state.placeCategory = {
                id: null,
                name: ''
            };
        }
    },

    SET_LOADING_STATE: (state, loadState) => {
        state.isLoading = loadState;
    },

    SET_CURRENT_POSITION: (state, currentPosition) => {
        state.location = true;
        state.currentPosition = currentPosition;
    },

    SET_LOCATION_AVAILABLE: (state, locationAvailable) => {
        state.locationAvailable = locationAvailable;
    },

    SET_FILTERS: (state, filters) => {
        state.filters = {
            ...state.filters,
            ...filters
        };
    },

    SET_PAGE: (state, page) => {
        state.page = page;
    },

    MAP_INIT: (state, value) => {
        state.mapInitialized = value;
    },

    SET_SEARCH_PLACE: (state, searchPlace) => {
        state.place = searchPlace;
    },

    DELETE_SEARCH_PLACE_CATEGORY: (state) => {
        state.placeCategory = {
            id: null,
            name: ''
        };
    },

    DELETE_SEARCH_PLACE: (state) => {
        state.place = '';
    },

    DELETE_SEARCH_CITY: (state) => {
        state.city = {
            name: '',
            longitude: null,
            latitude: null,
            fullName: ''
        };
    },

    SET_SELECTED_TAGS: (state, tags) => {
        state.selectedTags = tags;
    },

    ADD_SELECTED_TAG: (state, tagId) => {
        if (state.selectedTags.indexOf(tagId) === -1) {
            state.selectedTags.push(tagId);
        }
    },

    DELETE_SELECTED_TAG: (state, tagId) => {
        let index = state.selectedTags.indexOf(tagId);
        if (index > -1) {
            state.selectedTags.splice(index, 1);
        }
    },

    SET_SELECTED_FEATURES: (state, features) => {
        state.selectedFeatures = features;
    },

    ADD_SELECTED_FEATURE: (state, featureId) => {
        if (state.selectedFeatures.indexOf(featureId) === -1) {
            state.selectedFeatures.push(featureId);
        }
    },

    DELETE_SELECTED_FEATURE: (state, featureId) => {
        let index = state.selectedFeatures.indexOf(featureId);
        if (index > -1) {
            state.selectedFeatures.splice(index, 1);
        }
    },

    CLEAR_SELECTED_TAGS: (state) => {
        state.selectedTags = [];
    }
};
