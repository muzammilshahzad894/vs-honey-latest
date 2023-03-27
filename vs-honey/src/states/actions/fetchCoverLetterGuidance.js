import http from "../../helpers/http";
import * as helpers from "../../helpers/helpers";
import { toast } from "react-toastify";
import { TOAST_SETTINGS } from "../../utils/siteSettings";
import Text from "../../components/common/Text";

import {
  FETCH_COVER_LETTER_GUIDANCE_CONTENT,
  FETCH_COVER_LETTER_GUIDANCE_CONTENT_SUCCESS,
  FETCH_COVER_LETTER_GUIDANCE_CONTENT_FAILED
} from "./actionTypes";

export const fetchCoverLetterGuidance = () => (dispatch) => {
  dispatch({
    type: FETCH_COVER_LETTER_GUIDANCE_CONTENT,
    payload: null
  });
  http
    .get("cover-letter-guidance")
    .then(({ data }) => {
      dispatch({
        type: FETCH_COVER_LETTER_GUIDANCE_CONTENT_SUCCESS,
        payload: data
      });
    })
    .catch((error) => {
      dispatch({
        type: FETCH_COVER_LETTER_GUIDANCE_CONTENT_FAILED,
        payload: error
      });
    });
};
