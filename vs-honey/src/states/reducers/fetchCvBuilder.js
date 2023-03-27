import {
  FETCH_CV_BUILDER_CONTENT,
  FETCH_CV_BUILDER_CONTENT_SUCCESS,
  FETCH_CV_BUILDER_CONTENT_FAILED,
  SAVE_CV,
  SAVE_CV_SUCCESS,
  SAVE_CV_FAILED,
  FETCH_CV_DETAILS,
  FETCH_CV_DETAILS_SUCCESS,
  FETCH_CV_DETAILS_FAILED,
} from "../actions/actionTypes";

const initialState = {
  isLoading: true,
  isCvSubmitting: false,
  cvAction: null,
  content: {},
  error: false,
};

export default function (state = initialState, { type, payload }) {
  switch (type) {
    case FETCH_CV_BUILDER_CONTENT:
      return {
        ...state,
        isLoading: true,
        content: {},
      };
    case FETCH_CV_BUILDER_CONTENT_SUCCESS:
      return {
        ...state,
        isLoading: false,
        content: payload,
      };
    case FETCH_CV_BUILDER_CONTENT_FAILED:
      return {
        ...state,
        isLoading: false,
        content: {},
        error: payload,
      };
    case SAVE_CV:
      return {
        ...state,
        isCvSubmitting: true,
        cvAction: "save",
      };
    case SAVE_CV_SUCCESS:
      return {
        ...state,
        isCvSubmitting: false,
        cvAction: null,
      };
    case SAVE_CV_FAILED:
      return {
        ...state,
        isCvSubmitting: false,
        cvAction: null,
        error: payload,
      };
    default:
      return state;
  }
}
