import React, { useState, useEffect } from "react";
import { Link } from "react-router-dom";
import { API_UPLOADS_URL } from "../../../constants/paths";
import moment from "moment/moment";
import ReactPaginate from "react-paginate";
import ReactHtmlParser from 'html-react-parser';
import { ToastContainer } from "react-toastify";
import JobShareModel from "./JobShareModel";
import { useDispatch } from "react-redux";
import { saveLikeJob } from "../../../states/actions/likeJobs";

const JobList = ({ jobList, pageNo, itemsPerPage, totalJobs, handlePageClick, isFetching, featuredJobs, setFeaturedJobs }) => {
  const dispatch = useDispatch();
  const initialPage = pageNo - 1;
  const [pageCount, setPageCount] = useState(0);
  const [islogin, setIslogin] = useState(false);
  const [open, setOpen] = useState(false);
  const [link, setLink] = useState('');
  const [jobLists, setJobLists] = useState(jobList);
  const authToken = localStorage.getItem('authToken');

  useEffect(() => {
    setPageCount(Math.ceil(totalJobs / itemsPerPage));
  }, [totalJobs]);

  useEffect(() => {
    setJobLists(jobList);
  }, [jobList]);

  useEffect(() => {
    if (authToken) {
      setIslogin(true);
    }
  }, [authToken]);

  const handleCopyLink = (index) => {
    setOpen(true);
    const baseUrl = window.location.origin;
    setLink(`${baseUrl}/job-details/${jobList[index].id}`);
  }

  const handleSaveJob = (id) => {
    const index = jobLists.findIndex((job) => job.id === id);
    const newJobLists = [...jobLists];
    newJobLists[index].saved = true;
    setJobLists(newJobLists);

    const featuredIndex = featuredJobs.findIndex((job) => job.id === id);
    if (featuredIndex !== -1) {
      const newFeaturedJobs = [...featuredJobs];
      newFeaturedJobs[featuredIndex].saved = true;
      setFeaturedJobs(newFeaturedJobs);
    }

    dispatch(saveLikeJob(id));
  }

  return (
    <>
      <ToastContainer />
      <div className="flex job_flex">
        {isFetching ? (
          <div className="col">
            <div className="inner">
              <p>Fetching...</p>
            </div>
          </div>
        ) : (
          jobLists?.length > 0 ? (
            <>
              {jobLists?.map((job, index) => (
                <div className="col">
                  <div className="inner">
                    <div className="cta_act_btn">
                      <a href className="share_btn" onClick={() => handleCopyLink(index)}>
                        <i className="fi fi-share-alt" />
                      </a>
                      {islogin &&
                        job.saved ? (
                        <a href className="like_btn active_btn">
                          <i className="fi fi-heart" />
                        </a>
                      ) : (
                        <a href className="like_btn" onClick={() => handleSaveJob(job.id)}>
                          <i className="fi fi-heart" />
                        </a>
                      )
                      }
                    </div>
                    <div className="head_job">
                      <div className="img_ico">
                        <img
                          src={job.company_logo ? API_UPLOADS_URL + "/jobs/" + job.company_logo : "/images/dummy_img.png"}
                          alt
                        />
                      </div>
                      <div className="cntnt">
                        <div className="featured_lbl">{job.company_name}</div>
                        <h4>
                          <Link to={`/job-details/${job.id}`}>{job.title}</Link>
                        </h4>
                        <ul>
                          <li>
                            <i className="fi fi-rr-marker" />{" "}
                            <span>{job.city}</span>
                          </li>
                          <li>
                            <i className="fi fi-rr-briefcase" />{" "}
                            <span>{job.job_type?.title}</span>
                          </li>
                          <li>
                            <i className="fi fi-rr-clock-two" />
                            <span>{moment(job.created_date).fromNow()}</span>

                          </li>
                        </ul>
                      </div>
                    </div>
                    <div className="job_bdy">
                      {job?.description?.length > 200 ? (
                        <p>
                          {ReactHtmlParser(job?.description?.substring(0, 200))}...
                        </p>
                      ) : (
                        <p>{ReactHtmlParser(job?.description)}</p>
                      )}
                      <div className="skils">
                        {job.tags?.split(",").map((tag, index) => (
                          <span key={index}>{tag}</span>
                        ))}
                      </div>
                    </div>
                    <div className="job_footer">
                      <div className="job_price">
                        ${job.min_salary} - ${job.max_salary}
                      </div>
                    </div>
                  </div>
                </div>
              ))}
            </>
          ) : (
            <div className="col">
              <div className="inner">
                <div className="no_job">
                  <h4>No Jobs Found</h4>
                  <p>
                    <small>
                      Sorry, we couldn't find any jobs matching your search.
                    </small>
                  </p>
                </div>
              </div>
            </div>
          )
        )}
      </div>
      <div className="d-flex justify-content-center align-items-center">
        <ReactPaginate
          initialPage={initialPage}
          forcePage={initialPage}
          breakLabel="..."
          nextLabel="next >"
          onPageChange={handlePageClick}
          pageRangeDisplayed={5}
          pageCount={pageCount}
          previousLabel="< previous"
          pageClassName="page-item"
          pageLinkClassName="page-link"
          previousClassName="page-item"
          previousLinkClassName="page-link"
          nextClassName="page-item"
          nextLinkClassName="page-link"
          breakClassName="page-item"
          breakLinkClassName="page-link"
          containerClassName="pagination"
          activeClassName="active"
          renderOnZeroPageCount={false}
        />
      </div>
      {open && <JobShareModel setOpen={setOpen} link={link} />}

    </>
  );
};

export default JobList;
