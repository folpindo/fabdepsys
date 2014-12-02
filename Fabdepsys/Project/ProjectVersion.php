<?php

namespace Fabdepsys\Project;

/**
 * 

 * 1. Generate sequence and or increment sequence.
 * 2. If a previous stage has a higher sequence number, then the next stage
 * should be re-processed.
 * 3. 

 * Simulation:

  Project p1
  version p1v1
  sequence p1v1s1
  stage 1: p1v1s1g1s1
  stage 2: p1v1s1g2s1
  stage 3: p1v1s1g3s1
  stage 3: p1v1s1g3s2
  ...
  stage 2: p1v1s1g2s2
  stage 3: p1v1s1g3s3

  Observation:
  stage 2 - re-executed, on demand, sequence p1v1s1g2s2
  - increment stage sequence
  stage 3 - re-executed, as required by stage 2 sequence p1v1s1g2s2

  Question:
  1. What if I want to go on with the previous sequence?
  Requirements:
  a. The revision of the version should be brought back.

  Help:
  a. As long as we go with the normal sdlc (dev->stag-prod) process,
  and we use tagging, we can go with it.
  b. Retagging should be prohibited.
  c. The Application or Project version should not be dependent with
  the version control revision/release tag.

  project_version
  sequence_number should be updated
  the latest process stage should be set
  the dependency checker checks if there is next stage
 */
class ProjectVersion {

    protected $_project_id;
    protected $_project_version;
    protected $_version_status;
    protected $_sequence_number;
    protected $_process;
    protected $_date_created;
    protected $_date_modified;
    protected $_created_by;
    protected $_modified_by;
    
}
