import React, { useEffect, useState } from "react";
import Header from "../../shared/Header";
import Footer from "../../shared/Footer";

import { fetchFaq } from "../../../states/actions/fetchFaq";
import { useSelector, useDispatch } from "react-redux";
import useDocumentTitle from "../../../hooks/useDocumentTitle";
import LoadingScreen from "../../common/LoadingScreen";

import Text from "../../common/Text";

const Faq = () => {
  const dispatch = useDispatch();
  const data = useSelector((state) => state.fetchFaq.content);
  const isLoading = useSelector((state) => state.fetchFaq.isLoading);
  const { content, site_settings, faqs } = data;
  const [selected, setSelected] = useState(faqs?.[0].id);

  useEffect(() => {
    dispatch(fetchFaq());
  }, []);

  useDocumentTitle(data.page_title);

  return (
    <>
      {isLoading ? (
        <LoadingScreen />
      ) : (
        <>
          <Header site_settings={site_settings} />
          <main index>
            <section className="customer_support faq_sec">
              <div className="contain">
                <h1 className="text-center">
                  <Text string={content.banner_heading} />
                </h1>
                <div className="faqLst">
                  {faqs.map((f) => (
                    <div
                      className={selected === f.id ? "faqBlk active" : "faqBlk"}
                      onClick={() => setSelected(f.id)}
                    >
                      <h5>
                        <Text string={f.title} />
                      </h5>
                      <div className="txt">
                        <Text string={f.detail} />
                      </div>
                    </div>
                  ))}
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

export default Faq;
