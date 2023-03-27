import React, { useEffect, useState, useRef } from "react";
import Header from "../../shared/Header";
import Footer from "../../shared/Footer";

import {
  fetchSignupCandidate,
  createAccount,
  backToSignup,
  verifyEmail,
} from "../../../states/actions/fetchSignupCandidate";
import { useSelector, useDispatch } from "react-redux";
import useDocumentTitle from "../../../hooks/useDocumentTitle";
import LoadingScreen from "../../common/LoadingScreen";
import FormProcessingSpinner from "../../common/FormProcessingSpinner";
import { Link } from "react-router-dom";
import { set, useForm } from "react-hook-form";
import { ToastContainer } from "react-toastify";
import { TagsInput } from "react-tag-input-component";

const Signup = () => {
  const dispatch = useDispatch();
  const data = useSelector((state) => state.fetchSignupCandidate.content);
  const isLoading = useSelector(
    (state) => state.fetchSignupCandidate.isLoading
  );
  const isFormProcessing = useSelector(
    (state) => state.fetchSignupCandidate.isFormProcessing
  );
  const isFirstStepCompleted = useSelector(
    (state) => state.fetchSignupCandidate.isFirstStepCompleted
  );
  let firstSession = localStorage.getItem("isFirstStepCompleted");
  const { content, site_settings } = data;
  const [skills, setSkills] = useState([]);
  const [skillsError, setSkillsError] = useState(false);

  useEffect(() => {
    dispatch(fetchSignupCandidate());
  }, []);

  const [showPassOne, setShowPassOne] = useState(false);
  const [showPassTwo, setShowPassTwo] = useState(false);
  const [imageUrl, setImageUrl] = useState(null);
  const cvRef = useRef(null);
  const [cv, setCv] = useState(null);
  const [uploadCvError, setUploadCvError] = useState(null);

  const {
    register,
    watch,
    formState: { errors },
    handleSubmit,
    setValue,
    trigger,
  } = useForm();

  const {
    register: register2,
    formState: { errors: errors2 },
    handleSubmit: handleSubmit2,
  } = useForm();

  const handleCvClick = (e) => {
    e.preventDefault();
    setCv(null);
    cvRef.current.click();
  };

  const handleSelectFile = (e) => {
    setCv(e);
  };

  const firstSubmit = (data) => {
    if (skills.length === 0) {
      setSkillsError("Skills is required.");
      return;
    }
    if (!cv) {
      setUploadCvError("Please upload your CV/Resume");
      window.scrollTo({ top: 300, behavior: "smooth" });
      return false;
    } else {
      setUploadCvError('');
    }
    data.skills = skills;
    data.cv = cv;
    const file = cv?.target?.files[0];
    const fileType = file?.type;
    if (
      fileType !== "application/pdf" &&
      fileType !== "application/msword" &&
      fileType !==
      "application/vnd.openxmlformats-officedocument.wordprocessingml.document"
    ) {
      setUploadCvError("Please upload a word or pdf file");
      window.scrollTo({ top: 300, behavior: "smooth" });
      return;
    }
    dispatch(createAccount(data));
  };

  const secondSubmit = (data) => {
    data = { ...data, email: localStorage.getItem("email") };
    dispatch(verifyEmail(data));
  };

  const handleBackToPreviousForm = (e) => {
    e.preventDefault();
    localStorage.removeItem("isFirstStepCompleted");
    localStorage.removeItem("email");
    dispatch(backToSignup());
    // navigate("/signup");
  };

  const handleImgChange = (event) => {
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.readAsDataURL(file);
    if (!file.type.match("image.*")) {
      setImageUrl(null);
      return;
    }
    reader.onload = () => {
      setImageUrl(reader.result);
    };
    trigger("image");
  };

  useDocumentTitle(data.page_title);
  const handleSkillsChange = (tags) => {
    setSkills(tags);
    setSkillsError(false);
  };

  const formSubmit = () => {
    if (skills.length === 0) {
      setSkillsError("Skills is required.");
      return;
    }
  };
  return (
    <>
      {isLoading ? (
        <LoadingScreen />
      ) : (
        <>
          <ToastContainer />
          <Header site_settings={site_settings} />
          <main index>
            <section className="new_logon">
              <div className="contain">
                <div className="log_blk">
                  <form
                    onSubmit={handleSubmit(firstSubmit)}
                    style={{
                      display:
                        firstSession || isFirstStepCompleted ? "none" : "block",
                    }}
                  >
                    <h3>{content.page_title}</h3>
                    <p>
                      {content.sub_title}
                    </p>
                    <div className="row formRow">
                      <div className="col-md-6">
                        <div className="txtGrp">
                          <h6>{content.first_field_placeholder}</h6>
                          <input
                            type="text"
                            className="txtBox"
                            {...register("email", {
                              required: "Email is required.",
                              pattern: {
                                value:
                                  /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
                                message: "Please enter a valid email",
                              },
                            })}
                          />
                          <span className="validation-error">
                            {errors.email?.message}
                          </span>
                        </div>
                      </div>
                      <div className="col-md-6">
                        <div className="txtGrp pasDv">
                          <h6>{content.second_field_placeholder}</h6>
                          <div className="relative">
                            <input
                              type="file"
                              className="txtBox"
                              {...register("image", {

                                validate: (value) => {
                                  if (value[0]) {
                                    const fileExtension =
                                      value[0].name.split(".")[1];
                                    if (
                                      fileExtension === "jpg" ||
                                      fileExtension === "jpeg" ||
                                      fileExtension === "png"
                                    ) {
                                      return true;
                                    } else {
                                      return "Only jpg, jpeg and png files are allowed";
                                    }
                                  }
                                },
                              })}
                              onChange={handleImgChange}
                            />
                            <div className="company_image">
                              {imageUrl ? <img src={imageUrl} alt="Preview" /> : null}
                            </div>
                          </div>
                          <span className="validation-error">
                            {errors.image?.message}
                          </span>
                        </div>
                      </div>
                      <div className="col-md-6">
                        <div className="txtGrp">
                          <h6>{content.third_field_placeholder}</h6>
                          <input
                            type="text"
                            className="txtBox"
                            {...register("fname", {
                              required: "First Name is required.",
                              maxLength: {
                                value: 20,
                                message:
                                  "First Name should Not be greater than 20 characters.",
                              },
                              minLength: {
                                value: 2,
                                message:
                                  "First Name should be greater than atleast 2 characters.",
                              },
                            })}
                          />
                          <span className="validation-error">
                            {errors.fname?.message}
                          </span>
                        </div>
                      </div>
                      <div className="col-md-6">
                        <div className="txtGrp">
                          <h6>{content.fourth_field_placeholder}</h6>
                          <input
                            type="text"
                            className="txtBox"
                            {...register("lname", {
                              maxLength: {
                                value: 20,
                                message:
                                  "Last Name should Not be greater than 20 characters.",
                              },
                              minLength: {
                                value: 2,
                                message:
                                  "Last Name should be greater than atleast 2 characters.",
                              },
                            })}
                          />
                          <span className="validation-error">
                            {errors.lname?.message}
                          </span>
                        </div>
                      </div>
                      <div className="col-md-6">
                        <div className="txtGrp pasDv">
                          <h6>{content.fifth_field_placeholder}</h6>
                          <div className="relative">
                            <input
                              type={showPassOne ? "text" : "password"}
                              className="txtBox"
                              {...register("password", {
                                required: "Password is required.",
                                minLength: {
                                  value: 6,
                                  message:
                                    "Password should be atleast 6 characters long.",
                                },
                              })}
                            />
                            <i
                              className={
                                showPassOne ? "icon-eye-slash" : "icon-eye"
                              }
                              id="eye"
                              onClick={() => setShowPassOne(!showPassOne)}
                            />
                          </div>
                          <span className="validation-error">
                            {errors.password?.message}
                          </span>
                        </div>
                      </div>
                      <div className="col-md-6">
                        <div className="txtGrp pasDv">
                          <h6>{content.sixth_field_placeholder}</h6>
                          <div className="relative">
                            <input
                              type={showPassTwo ? "text" : "password"}
                              className="txtBox"
                              {...register("c_password", {
                                required: "Confirm Password is required.",
                                validate: (val) => {
                                  if (watch("password") != val) {
                                    return "Your passwords do no match.";
                                  }
                                },
                                minLength: {
                                  value: 6,
                                  message:
                                    "Password should be atleast 6 characters long.",
                                },
                              })}
                            />
                            <i
                              className={
                                showPassTwo ? "icon-eye-slash" : "icon-eye"
                              }
                              id="eye"
                              onClick={() => setShowPassTwo(!showPassTwo)}
                            />
                          </div>
                          <span className="validation-error">
                            {errors.c_password?.message}
                          </span>
                        </div>
                      </div>
                      <div className="col-md-12" id="resume-section">
                        <div className="txtGrp fullWid">
                          <div className="fileFlex flex">
                            <span>
                              <i className="fi-file"></i>
                            </span>
                            <h4
                              className="uploadImg"
                              id="uploadDp"
                              data-file=""
                              onClick={handleCvClick}
                            >
                              {cv
                                ? cv?.target?.files[0]?.name
                                : content.seventh_field_placeholder}
                              {!cv && (
                                <small> (doc, docx or pdf file) - Maximum 3 MB.</small>
                              )}
                            </h4>
                          </div>
                          {uploadCvError && (
                            <span className="validation-error">
                              {uploadCvError}
                            </span>
                          )}
                        </div>
                      </div>
                      <input
                        type="file"
                        name="resume"
                        id="cv"
                        ref={cvRef}
                        className="hidden"
                        onChange={handleSelectFile}
                      />
                      <div className="col-md-6">
                        <div className="txtGrp pasDv">
                          <h6>{content.eighth_field_placeholder}</h6>
                          <select
                            name=""
                            className="txtBox"
                            id=""
                            {...register("profession", {
                              required: "Profession is required.",
                            })}
                          >
                            <option value="" selected="">Answer</option>
                            {content.first_dropdown_option?.split(",").map((item, index) => {
                              return (
                                <option key={index} value={item}>
                                  {item}
                                </option>
                              );
                            })}
                          </select>
                          <span className="validation-error">
                            {errors.profession?.message}
                          </span>
                        </div>
                      </div>
                      <div className="col-md-6">
                        <div className="txtGrp pasDv">
                          <h6>{content.ninth_field_placeholder}</h6>
                          <select
                            className="txtBox"
                            {...register("second_activity_field")}
                          >
                            <option value="" selected="">Answer</option>
                            {content.second_dropdown_option?.split(",").map((item, index) => {
                              return (
                                <option key={index} value={item}>
                                  {item}
                                </option>
                              );
                            })}
                          </select>
                        </div>
                      </div>
                      <div className="col-md-6">
                        <div className="txtGrp pasDv">
                          <h6>{content.tenth_field_placeholder}</h6>
                          <select
                            name=""
                            className="txtBox"
                            id=""
                            {...register("degree", {
                              required: "Degree is required.",
                            })}
                          >
                            <option value="" selected="">Answer</option>
                            {content.third_dropdown_option?.split(",").map((item, index) => {
                              return (
                                <option key={index} value={item}>
                                  {item}
                                </option>
                              );
                            })}
                          </select>
                          <span className="validation-error">
                            {errors.degree?.message}
                          </span>
                        </div>
                      </div>

                      <div className="col-md-6">
                        <div className="txtGrp pasDv">
                          <h6>{content.eleventh_field_placeholder}</h6>
                          <div className="relative">
                            <input
                              type="number"
                              className="txtBox"
                              {...register("experience", {
                                required: "Experience is required.",
                                pattern: {
                                  value: /^[0-9]*$/,
                                  message: "Please enter a valid number",
                                },
                              })}
                            />
                          </div>
                          <span className="validation-error">
                            {errors.experience?.message}
                          </span>
                        </div>
                      </div>

                      <div className="col-md-6">
                        <div className="txtGrp pasDv">
                          <h6>{content.twelfth_field_placeholder}</h6>
                          <div className="relative">
                            <input
                              type="number"
                              className="txtBox"
                              {...register("minPrice", {
                                required: "Min Price is required.",
                                pattern: {
                                  value: /^[0-9]*$/,
                                  message: "Please enter a valid number",
                                },
                              })}
                            />
                          </div>
                          <span className="validation-error">
                            {errors.minPrice?.message}
                          </span>
                        </div>
                      </div>
                      <div className="col-md-6">
                        <div className="txtGrp pasDv">
                          <h6>{content.thirteenth_field_placeholder}</h6>
                          <div className="relative">
                            <input
                              type="number"
                              className="txtBox"
                              {...register("maxPrice", {
                                required: "Max Price is required.",
                                pattern: {
                                  value: /^[0-9]*$/,
                                  message: "Please enter a valid number",
                                },
                              })}
                            />
                          </div>
                          <span className="validation-error">
                            {errors.maxPrice?.message}
                          </span>
                        </div>
                      </div>

                      <div className="col-md-12">
                        <div className="txtGrp pasDv">
                          <h6>{content.fourteenth_field_placeholder}</h6>
                          <div className="relative">
                            <textarea
                              type="text"
                              className="txtBox"
                              {...register("summary", {
                                required: "Summary is required.",
                              })}
                            />
                          </div>
                          <span className="validation-error">
                            {errors.summary?.message}
                          </span>
                        </div>
                      </div>

                      <div className="col-md-12">
                        <div className="txtGrp pasDv">
                          <h6>{content.fifteenth_field_placeholder}</h6>
                          <TagsInput
                            value={skills}
                            onChange={handleSkillsChange}
                            // onChange={removeError}
                            name="skills"
                            placeHolder={content.skills_placeholder}
                          />
                          {skillsError && (
                            <span className="validation-error">
                              {skillsError}
                            </span>
                          )}
                        </div>
                      </div>

                      <div className="col-md-6">
                        <div className="txtGrp">
                          <h6>{content.sixteenth_field_placeholder}</h6>
                          <input
                            type="text"
                            className="txtBox"
                            {...register("phone", {
                              required: "Phone is required.",
                            })}
                          />
                          <span className="validation-error">
                            {errors.phone?.message}
                          </span>
                        </div>
                      </div>

                      <div className="col-md-6">
                        <div className="txtGrp pasDv">
                          <h6>{content.seventeenth_field_placeholder}</h6>
                          <div className="relative">
                            <input
                              type="text"
                              className="txtBox"
                              {...register("city", {
                                required: "City is required.",
                              })}
                            />
                          </div>
                          <span className="validation-error">
                            {errors.city?.message}
                          </span>
                        </div>
                      </div>

                      <div className="col-md-6">
                        <div className="txtGrp pasDv">
                          <h6>{content.eighteenth_field_placeholder}</h6>
                          <div className="relative">
                            <input
                              type="text"
                              className="txtBox"
                              {...register("country", {
                                required: "Country is required.",
                              })}
                            />
                          </div>
                          <span className="validation-error">
                            {errors.country?.message}
                          </span>
                        </div>
                      </div>

                      <div className="col-md-6">
                        <div className="txtGrp pasDv">
                          <h6>{content.nineteenth_field_placeholder}</h6>
                          <div className="relative">
                            <input
                              type="text"
                              className="txtBox"
                              {...register("zip", {
                                required: "Zip Code is required.",
                              })}
                            />
                          </div>
                          <span className="validation-error">
                            {errors.zip?.message}
                          </span>
                        </div>
                      </div>

                    </div>
                    <div className="bTn text-center">
                      <button
                        type="submit"
                        onClick={formSubmit}
                        className="webBtn blockBtn icoBtn"
                        disabled={isFormProcessing}
                      >
                        <img src="images/icon-pencil.svg" alt="" /> {content.save_button_text}
                        <FormProcessingSpinner
                          isFormProcessing={isFormProcessing}
                        />
                      </button>
                    </div>
                    <input
                      type="file"
                      id="uploadFile"
                      name="uploadFile"
                      className="uploadFile"
                      data-file
                    />
                  </form>

                  <form
                    onSubmit={handleSubmit2(secondSubmit)}
                    style={{
                      display:
                        firstSession || isFirstStepCompleted ? "block" : "none",
                    }}
                  >
                    <button
                      onClick={handleBackToPreviousForm}
                      className="back_btn_btn"
                    >
                      Back to signup
                    </button>
                    <h3>Email Verification</h3>
                    <div className="row formRow">
                      <div className="col-md-12">
                        <div className="txtGrp">
                          <h6>Enter OTP</h6>
                          <input
                            type="text"
                            className="txtBox"
                            placeholder="Enter 6 digit OTP"
                            {...register2("code", {
                              required: "Six digit code is required.",
                            })}
                          />
                          <span className="validation-error">
                            {errors2.code?.message}
                          </span>
                        </div>
                      </div>
                    </div>
                    <div className="bTn text-center">
                      <button
                        type="submit"
                        className="webBtn blockBtn icoBtn"
                        disabled={isFormProcessing}
                      >
                        Submit
                        <FormProcessingSpinner
                          isFormProcessing={isFormProcessing}
                        />
                      </button>
                    </div>
                  </form>
                  <div className="haveAccount text-center">
                    <span>Already have an account?</span>
                    <Link to="/signin">&nbsp;Sign in</Link>
                  </div>
                </div>
              </div>
            </section>
          </main>
          <Footer site_settings={site_settings} />
        </>
      )}
    </>
  );
};

export default Signup;
